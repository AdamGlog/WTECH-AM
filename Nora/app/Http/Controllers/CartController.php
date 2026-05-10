<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kosik;
use App\Models\KosikPolozka;
use App\Models\Produkt;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\OrderItem;
use App\Enums\StavObjednavky;

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
    // Zabezpecenie refreshu produktov v kosiku
    public function list()
    {
        $cart = session()->get('cart', []);

        if (!empty($cart)) {
            $productIds = array_keys($cart);
            
            // Beriem z db len to co existuje
            $existujuceProdukty = Produkt::whereIn('id', $productIds)->get()->keyBy('id');

            $aktualizovanyCart = [];
            $zmena = false;

            foreach ($cart as $id => $item) {
                if ($existujuceProdukty->has($id)) {
                    // Volam aj refresh, aby sa zobrazovali zmeny ceny atd
                    $produkt = $existujuceProdukty[$id];
                    $aktualizovanyCart[$id] = $item;
                    $aktualizovanyCart[$id]['cena'] = $produkt->cena;
                    $aktualizovanyCart[$id]['meno'] = $produkt->meno;
                    $aktualizovanyCart[$id]['image'] = $produkt->obrazok;
                } else {
                    // Produkt bol z DB vymazany, nema preco byt v session
                    $zmena = true;
                }
            }

            if ($zmena) {
                session()->put('cart', $aktualizovanyCart);
                $cart = $aktualizovanyCart;

                // Update aj pre uzivatela 
                if (Auth::check()) {
                    $kosik = $this->vytvoritAleboGetKosik();
                    $this->syncSessionDoDB($kosik->id);
                }
            }
        }

        return view('cart/cart', compact('cart'));
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
        //synchronizacia zluceneho kosika so session do DB
        $kosik = $this->vytvoritAleboGetKosik();
        $this->syncSessionDoDB($kosik->id);
    }

    //funkcia sluzi na pridanie hocjakeho poctu kusov produktov do kosika 
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
        //ak je kosik prazdny ta vrat na kosik
        if(empty(session()->get('cart'))){
            return redirect('/cart');
        }
        return view('cart/cartShipment');
    }

    public function ulozDoprava(Request $request)
    {
        //overenie ze boli vybrate obe moznosti
        $request->validate([
            'typ_dorucenia' => 'required|in:kurier,posta,osobny_odber',
            'typ_platby'    => 'required|in:karta,prevod,dobierka', ]);
        //ulozenie vybranej dopravy a platby do session
        session()->put('checkout.typ_dorucenia', $request->typ_dorucenia);
        session()->put('checkout.typ_platby', $request->typ_platby);
        return redirect('/cartData');
    }

    public function zobrazData()
    {
        //ak preskocil kroky ta ho vratime spat
        if(empty(session()->get('cart'))){
            return redirect('/cart');
        }
        else if(empty(session()->get('checkout.typ_dorucenia'))){
            return redirect('/cartShipment');
        }
        //vsetko prazdne pre neprihlasenych
        $prefill = [
            'meno'       => '',
            'priezvisko' => '',
            'tel_cislo'  => '',
            'ulica'      => '',
            'cislo_domu' => '',
            'mesto'      => '',
            'psc'        => '',
            'krajina'    => '', ];
        //pre prihlasenych sa vyplni ich udajmi
        if(Auth::check()){
            $user = Auth::user()->load('mesto');
            $prefill = [
                'meno'       => $user->meno ?? '',
                'priezvisko' => $user->priezvisko ?? '',
                'tel_cislo'  => $user->telefonne_cislo ?? '',
                'ulica'      => $user->ulica ?? '',
                'cislo_domu' => $user->cislo_domu ?? '',
                'mesto'      => $user->mesto?->mesto ?? '',
                'psc'        => $user->mesto?->psc ?? '',
                'krajina'    => $user->mesto?->krajina ?? '', ];
        }
        return view('cart/cartData', compact('prefill'));
    }

    public function ulozData(Request $request)
    {
        //validacia dodacich udajov
        $request->validate([
            'meno'       => 'required|string|max:50',
            'priezvisko' => 'required|string|max:50',
            'tel_cislo'  => 'required|string|max:20',
            'ulica'      => 'required|string|max:100',
            'cislo_domu' => 'required|string|max:10',
            'mesto'      => 'required|string|max:50',
            'psc'        => 'required|string|max:10',
            'krajina'    => 'required|string|max:30',
        ]);
        //ulozenie dodacich udajov do session
        session()->put('checkout.adresa', $request->only(['meno', 'priezvisko', 'tel_cislo', 'ulica', 'cislo_domu', 'mesto', 'psc', 'krajina']));
        return redirect('/cartSummary');
    }

    public function zobrazSumar()
    {
        //ak preskocil kroky ta ho vratime spat
        if(empty(session()->get('cart'))){
            return redirect('/cart');
        }
        else if(empty(session()->get('checkout.typ_dorucenia'))){
            return redirect('/cartShipment');
        }
        else if(empty(session()->get('checkout.adresa'))){
            return redirect('/cartData');
        }
        //predame session data do view
        $checkout = session()->get('checkout');
        $cart     = session()->get('cart');
        return view('cart/cartSummary', compact('checkout', 'cart'));
    }

    public function vytvorObjednavku()
    {
        $cart     = session()->get('cart', []);
        $checkout = session()->get('checkout', []);
        //ochrana ak session vyprsala alebo niekto prisiel priamo
        if(empty($cart) || empty($checkout)){
            return redirect('/cart')->with('error', 'Niečo sa pokazilo, skúste znova.');
        }
        //spravenie adresy do jedneho stringu pre DB
        $adresa      = $checkout['adresa'];
        $adresaText  = $adresa['ulica'] . ' ' . $adresa['cislo_domu'] . ', '
                    . $adresa['psc'] . ' ' . $adresa['mesto'] . ', '
                    . $adresa['krajina'];
        //vypocet celkovej ceny a vytvorenie objednavky
        $celkovaCena = collect($cart)->sum(fn($item) => $item['pocet'] * $item['cena']);
        $order = Order::create([
            'user_id'          => Auth::id(),
            'typ_platby'       => $checkout['typ_platby'],
            'typ_dorucenia'    => $checkout['typ_dorucenia'],
            'stav'             => StavObjednavky::NOVA->value,
            'celkova_cena'     => $celkovaCena,
            'adresa_dorucenia' => $adresaText,
            'datum_objednania' => now(),
        ]);
        //ulozenie jednotlivych poloziek objednavky
        foreach($cart as $produktId => $item) {
            OrderItem::create([
                'order_id'   => $order->id,
                'product_id' => $produktId,
                'pocet'      => $item['pocet'], ]);
        }
        //znizenie poctu kusov na sklade po objednavke
        foreach($cart as $produktId => $item){
            Produkt::where('id', $produktId)->decrement('pocet_na_sklade', $item['pocet']);
        }
        //vzcistit kosik
        session()->forget('cart');
        session()->forget('checkout');
        if(Auth::check()){
            $kosik = Kosik::where('pouzivatel_id', Auth::id())->first();
            if($kosik){
                KosikPolozka::where('kosik_id', $kosik->id)->delete();
            }
        }
        return redirect('/cartCompleted/' . $order->id);
    }

    public function zobrazDokoncenie($id)
    {
        //nacitanie objednavky podla id a zobrazenie stranky
        $order = Order::findOrFail($id);
        return view('cart/cartCompleted', compact('order'));
    }
}
