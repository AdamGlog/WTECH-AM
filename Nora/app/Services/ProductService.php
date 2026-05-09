<?php

namespace App\Services;

use App\Models\Produkt;
use App\Models\ProduktObrazok;
use Illuminate\Support\Facades\Storage;
use \Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ProductService
{
    public function createProduct(array $data)
    {
        return DB::transaction(function () use ($data) {
            // 1. Predbežne spracujeme prvý obrázok, aby sme mali názov pre tabuľku 'produkty'
            $mainFileName = 'default.jpg'; // Záloha, ak by niekto nenahral nič

            if (isset($data['obrazky']) && count($data['obrazky']) > 0) {
                // Uložíme prvý súbor hneď teraz, aby sme získali jeho náhodný názov
                $mainFileName = $data['obrazky'][0]->store('', 'public');
            }

            // 2. Pridáme názov obrázka do dát pre vytvorenie produktu
            // Týmto vyriešime SQL error "null value in column obrazok"
            $data['obrazok'] = substr($mainFileName, 0, 255); // Pozor na ten limit 30 znakov!

            // 3. Vytvoríme produkt (teraz už obsahuje 'obrazok', takže DB je spokojná)
            $product = Produkt::create($data);

            // 4. Uložíme všetky obrázky do galérie (tabuľka produkt_obrazky)
            if (isset($data['obrazky'])) {
                foreach ($data['obrazky'] as $index => $file) {
                    // Prvý obrázok sme už uložili na disk, ostatné musíme dohrať
                    if ($index === 0) {
                        $fileName = $mainFileName;
                    } else {
                        $fileName = $file->store('', 'public');
                    }
                    
                    $dbPath = 'storage/' . $fileName;

                    ProduktObrazok::create([
                        'produkt_id' => $product->id,
                        'cesta' => $dbPath,
                        'hlavny' => ($index === 0),
                    ]);
                }
            }

            return $product;
        });
    }

    public function updateProduct(Produkt $product, array $data)
    {
        return DB::transaction(function () use ($product, $data) {
            
            // 1. ZMAZANIE OZNAČENÝCH OBRÁZKOV
            if (!empty($data['odstranit_obrazky'])) {
                $imgsToDelete = ProduktObrazok::whereIn('id', $data['odstranit_obrazky'])->get();
                foreach ($imgsToDelete as $img) {
                    $fullPath = public_path($img->cesta);
                    if (File::exists($fullPath)) {
                        File::delete($fullPath);
                    }
                    $img->delete();
                }
            }

            // 2. NAHRÁVANIE NOVÝCH OBRÁZKOV
            if (isset($data['obrazky']) && count($data['obrazky']) > 0) {
                // Zistíme, či po mazaní ostal nejaký hlavný obrázok
                $hasMain = $product->obrazky()->where('hlavny', true)->exists();

                foreach ($data['obrazky'] as $index => $file) {
                    $fileName = $file->store('', 'public');
                    $dbPath = 'storage/' . $fileName;

                    // Ak produkt nemá hlavný obrázok, prvý z nahraných ním bude
                    $isMain = (!$hasMain && $index === 0);

                    ProduktObrazok::create([
                        'produkt_id' => $product->id,
                        'cesta'      => $dbPath,
                        'hlavny'     => $isMain,
                    ]);

                    if ($isMain) {
                        $hasMain = true; // Teraz už hlavný máme
                    }
                }
            }

            // 3. LOGIKA PRESTAVENIA HLAVNÉHO OBRÁZKA (Ak žiadny nie je určený)
            // Toto rieši situáciu, keď si zmazal hlavný a nepridal si žiadne nové, 
            // alebo si len zmazal hlavný a ostali tam staršie vedľajšie obrázky.
            $currentMain = $product->obrazky()->where('hlavny', true)->first();

            if (!$currentMain) {
                // Ak nemáme hlavný, skúsime vziať prvý, ktorý v galérii ostal
                $newMain = $product->refresh()->obrazky()->first(); 
                
                if ($newMain) {
                    $newMain->update(['hlavny' => true]);
                    $currentMain = $newMain;
                }
            }

            // 4. SYNCHRONIZÁCIA DO TABUĽKY 'PRODUKTY'
            // Ak máme nejaký hlavný obrázok v galérii, jeho názov musí byť v $product->obrazok
            if ($currentMain) {
                $fileNameOnly = str_replace('storage/', '', $currentMain->cesta);
                $data['obrazok'] = substr($fileNameOnly, 0, 255);
            } else {
                // Ak produkt nemá absolútne žiaden obrázok (všetko zmazané)
                $data['obrazok'] = 'default.jpg'; // Alebo iná hodnota, ktorú tvoja DB akceptuje
            }

            // 5. FINÁLNY UPDATE PRODUKTU
            $product->update($data);

            return $product;
        });
    }

    public function deleteProduct(Produkt $product)
    {
        return DB::transaction(function () use ($product) {
            // 1. Najprv si uložíme cesty k súborom do poľa, kým produkt ešte existuje
            $cestyNaZmazanie = $product->obrazky->pluck('cesta')->toArray();

            try {
                // 2. Skúsime vymazať produkt z DB
                // Ak je v košíku a nemáš nastavené cascade delete v košiku, tu to hodí Exception
                $product->delete();
            } catch (QueryException $e) {
                // Ak nastane chyba (napr. Foreign Key), transakcia sa zruší a k mazaniu súborov nedôjde
                throw new \Exception("Produkt nie je možné vymazať, pretože sa nachádza v objednávke alebo košíku.");
            }

            // 3. AŽ TERAZ, keď produkt v DB už nie je, zmažeme súbory z disku
            foreach ($cestyNaZmazanie as $cesta) {
                $fullPath = public_path($cesta);
                if (File::exists($fullPath)) {
                    File::delete($fullPath);
                }
            }

            return true;
        });
    }

}