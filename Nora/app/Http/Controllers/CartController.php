<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kosik;
use App\Models\KosikPolozka;
use App\Models\Produkt;

class CartController extends Controller
{
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
        return redirect()->back();
    }
}
