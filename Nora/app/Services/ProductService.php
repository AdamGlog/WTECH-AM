<?php

namespace App\Services;

use App\Models\Produkt;
use App\Models\ProduktObrazok;
use Illuminate\Support\Facades\Storage;
use \Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

// Logika vytvarania, aktualizovania a mazania obrazkov vytvorena pomocou Gemini AI: https://gemini.google.com
class ProductService
{
    public function createProduct(array $data)
    {
        return DB::transaction(function () use ($data) {
            $mainFileName = 'default.jpg';
            // Laravel generuje nahodne nazvy, kedze ho chcem priradit aj pre produkt, musim ho najprv storenut
            if (isset($data['obrazky']) && count($data['obrazky']) > 0) {
                $mainFileName = $data['obrazky'][0]->store('', 'public');
            }

            // Vytvoreny obrazok pridam do dat produktu
            $data['obrazok'] = substr($mainFileName, 0, 255);
            $product = Produkt::create($data);

            // Do tabulky produkt_obrazky pridame vsetky obrazky
            if (isset($data['obrazky'])) {
                foreach ($data['obrazky'] as $index => $file) {
                    // Prvý obrázok sme už uložili na disk, ostatné musíme dohrať
                    if ($index === 0) {
                        $fileName = $mainFileName;
                    } else {
                        // ukladam rovno do storage
                        $fileName = $file->store('', 'public');
                    }
                    // do tejto tabulky ukladame aj s storage prefixom
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
            
            // Logika mazania 
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

            // Nahravanie novych obrazkov
            if (isset($data['obrazky']) && count($data['obrazky']) > 0) {
                // Handlovanie ak odstranime hlavny obrazok
                $hasMain = $product->obrazky()->where('hlavny', true)->exists();

                foreach ($data['obrazky'] as $index => $file) {
                    $fileName = $file->store('', 'public');
                    $dbPath = 'storage/' . $fileName;

                    // Ak teda mame este nejake obrazky, zvysny obrazok nastavime ako hlavny
                    $isMain = (!$hasMain && $index === 0);

                    ProduktObrazok::create([
                        'produkt_id' => $product->id,
                        'cesta'      => $dbPath,
                        'hlavny'     => $isMain,
                    ]);

                    if ($isMain) {
                        $hasMain = true;
                    }
                }
            }
            // Pokracovanie logiky nastavenie 
            $currentMain = $product->obrazky()->where('hlavny', true)->first();

            if (!$currentMain) {
                $newMain = $product->refresh()->obrazky()->first(); 
                
                if ($newMain) {
                    $newMain->update(['hlavny' => true]);
                    $currentMain = $newMain;
                }
            }

            // Uprava noveho hlavneho obrazku aj pre produkt (pre zvysok stranky)
            if ($currentMain) {
                $fileNameOnly = str_replace('storage/', '', $currentMain->cesta);
                $data['obrazok'] = substr($fileNameOnly, 0, 255);
            } else {
                $data['obrazok'] = 'default.jpg';
            }

            $product->update($data);

            return $product;
        });
    }

    public function deleteProduct(Produkt $product)
    {
        return DB::transaction(function () use ($product) {
            // Kedze najprv mazeme produkt, az potom jeho obrazky, potrebujeme si ulozit ake vsetky obrazky mal
            $cestyNaZmazanie = $product->obrazky->pluck('cesta')->toArray();

            try {
                // Vymazanie produktu, ktore moze vyhodit error
                $product->delete();
            } catch (QueryException $e) {
                // Ak je produkt v kosiku alebo v objednavke vyhodim errror 
                throw new \Exception("Produkt nie je možné vymazať, pretože sa nachádza v objednávke alebo košíku.");
            }

            // A teraz, ked produkt nie je v DB vymazeme jeho obrazky
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