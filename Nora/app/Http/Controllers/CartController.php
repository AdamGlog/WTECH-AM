<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kosik;
use App\Models\KosikPolozka;
use App\Models\Produkt;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    //pomocna funkcia na kosik
    public function vytvoritAleboGetKosik()
    {
        return Kosik::firstOrCreate(
            ['pouzivatel_id' => Auth::id()],
            ['posledny_update' => now()->toDateString()]
        );
    }

    //pomocna funkcia na synchronizaciu session s databazou
    public function syncSessionDoDB(int $kosikId)
    {
        $cart = session()->get('cart', []);

        KosikPolozka::where('kosik_id', $kosikId)->delete();

        foreach ($cart as $produktId => $item) {
            KosikPolozka::create([
                'kosik_id'   => $kosikId,
                'produkt_id' => $produktId,
                'pocet_ks'   => $item['pocet'],
            ]);
        }
        Kosik::where('id', $kosikId)->update(['posledny_update' => now()->toDateString()]);
    }

    //nacitanie databazy po prihlaseni
    public function nacitajDBdoSession()
    {
        if(!Auth::check()){
            return;
        }
        $kosik = Kosik::where('pouzivatel_id', Auth::id())->first();
        $cart  = session()->get('cart', []);

        if($kosik){
            foreach($kosik->polozky as $polozka){
                $produkt = $polozka->produkt;
                $id      = $polozka->produkt_id;

                if(isset($cart[$id])){
                    // Ak je v oboch, berieme vyššie množstvo
                    $cart[$id]['pocet'] = max($cart[$id]['pocet'], $polozka->pocet_ks);
                } 
                else{
                    $cart[$id] = [
                        'meno'  => $produkt->meno,
                        'pocet' => $polozka->pocet_ks,
                        'cena'  => $produkt->cena,
                        'image' => $produkt->obrazok ?? null,];
                }
            }
        }
        session()->put('cart', $cart);
        // Sync zlúčeného košíka späť do DB
        $kosik = $this->vytvoritAleboGetKosik();-
        $this->syncSessionDoDB($kosik->id);
    }

    // Funkcia slúži na pridanie lubovoľného počtu kusov produktov do košíka 
    public function pridat(Request $request)
    {
        $request->validate([
            'id'  => 'required|integer|exists:produkty,id',
            'qty' => 'required|integer|min:1'
        ]);

        $produkty = Produkt::findOrFail($request->id);
        $cart = session()->get('cart', []);
        $id = $request->id;

        if(isset($cart[$id])){
            $cart[$id]['pocet'] += $request->qty;
        } 
        else{
            $cart[$id] = [
                'meno'      => $produkty->meno,
                'pocet'  => $request->qty,
                'cena'     => $produkty->cena,
                'image' => $produkty->obrazok ?? null,
            ];
        }
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 
            $request->qty . ' × ' . $produkty->meno . ' bolo pridané do košíka.'
        );
    }
    // Táto funkcia slúži v košíku na aktualizáciu počtu kusov produktu a prípadné vymazanie z košíka
    public function aktualizovat(Request $request)
    {
        $cart = session()->get('cart', []);
        $id = $request->id;
        $zmena = $request->zmena; //-1 alebo 1 alebo pri delete mnozstvo v kosiku

        if(isset($cart[$id])){
            $cart[$id]['pocet'] += $zmena;
            //ak pocet klesne na 0, produkt vymazeme
            if($cart[$id]['pocet'] < 1){
                unset($cart[$id]);
            }
            session()->put('cart', $cart);
        }
        
        //pridavame ajax aby sme nerefreshovali stranku
        if ($request->expectsJson() || $request->ajax()) {
            return response()->json([
                'success'    => true,
                'cart'       => $cart,
                'total' => number_format(collect($cart)->sum(function($item){
                    return $item['pocet'] * $item['cena'];
                }), 2),
                'items' => collect($cart)->map(function($item, $id){
                    return [
                        'id' => $id,
                        'pocet' => $item['pocet'],
                        'cena'  => $item['cena']
                    ];
                })->values(),
                'cart_empty' => empty($cart),
            ]);
        }
        return redirect()->back();
    }

    public function zobrazDoprava()
    {
        if(empty(session()->get('cart'))){
            return redirect('/cart');
        }
        return view('cart/cartShipment');
    }

    public function ulozDoprava(Request $request)
    {
        $request->validate([
            'typ_dorucenia' => 'required|in:kurier,posta,osobny_odber',
            'typ_platby'    => 'required|in:karta,prevod,dobierka', ]);

        session()->put('checkout.typ_dorucenia', $request->typ_dorucenia);
        session()->put('checkout.typ_platby', $request->typ_platby);
        return redirect('/cartData');
    }
}
