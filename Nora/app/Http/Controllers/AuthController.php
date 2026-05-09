<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\CartController;

class AuthController extends Controller
{

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'nickname' => ['required', 'string'],
            'heslo'    => ['required', 'string'],
        ]);

        // Laravel automaticky hashuje a porovnáva vďaka 'hashed' castu
        if (Auth::attempt(['nickname' => $credentials['nickname'], 'password' => $credentials['heslo']])) {
            $request->session()->regenerate();
            app(CartController::class)->nacitajDBdoSession();
            return redirect()->intended('/profileOverview');
        }

        return back()->withErrors([
            'nickname' => 'Zlé prihlasovacie údaje.',
        ])->onlyInput('nickname');
    }

    public function profile()
    {
        $user = Auth::user();
        return view('profile/profileOverview', ['user' => $user]);
    }

    public function logout()
    {
        if(Auth::check()){
            $kosik = app(CartController::class)->vytvoritAleboGetKosik();
            app(CartController::class)->syncSessionDoDB($kosik->id);
        }

        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('/');
    }

    public function showOrders()
    {
        if(!Auth::check()){
            return redirect('/');
        }
        
        $user = Auth::user();
        $orders = $user->orders()
                   ->with('items.product') 
                   ->orderBy('datum_objednania', 'desc')
                   ->get();

        return view('profile/profileOrders', compact('orders'));
    }

    public function updatePassword(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'old_password' => 'required',
            'password' => 'required|string|min:8|max:30|confirmed',
        ], [
            'password.confirmed' => 'Nové heslá sa nezhodujú.',
            'password.min' => 'Nové heslo musí mať aspoň 8 znakov.',
        ]);

        if (!Hash::check($request->old_password, $user->heslo)) {
            return back()->withErrors(['old_password' => 'Pôvodné heslo nie je správne.']);
        }

        $user->heslo = Hash::make($request->password);
        $user->save();

        return back()->with('success', 'Heslo bolo úspešne aktualizované.');
    }

    //ulozenie zakliknutia radiobuttona pre newsletter len pre session
    public function updateNewsletterSession(Request $request)
    {
        $status = $request->has('newsletter');
        session(['newsletter_active' => $status]);
        return back();
    }

    public function showProfilePrivateData()
    {
        $user = Auth::user(); 
        return view('profile/profilePrivacy', compact('user'));
    }

    public function updateDetails(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'meno' => 'required|string|max:50',
            'priezvisko' => 'required|string|max:50',
            'email' => 'required|email|unique:pouzivatelia,email,' . $user->id,
            'telefon' => 'nullable|string',
            'ulica' => 'nullable|string',
            'cislo_domu' => 'nullable|string',
            'psc' => 'required|string',
        ]);

        $mestoZCiselnika = \DB::table('mesta_s_psc')->where('psc', $request->psc)->first();
        if(!$mestoZCiselnika){
            return back()->withErrors(['psc' => 'Zadané PSČ je neplatné.']);
        }

        $user->fill([
            'meno' => $request->meno,
            'priezvisko' => $request->priezvisko,
            'email' => $request->email,
            'telefonne_cislo' => $request->telefonne_cislo,
            'ulica' => $request->ulica,
            'cislo_domu' => $request->cislo_domu,
            'mesto_psc' => $mestoZCiselnika->id, //mesto z ciselnikovej tabulky podla psc
        ]);

        $user->save();
        return back()->with('success', 'Údaje boli úspešne aktualizované!');
    }

    public function showProfileData()
    {
    //nacitame si mesto aby sme mali pristup k jeho psc
        $user = Auth::user()->load('mesto'); 
       return view('profile/profileData', compact('user'));
    }

   public function showFavorites()
    {
        $user = Auth::user();
        //nacitame wishlist pouzivatela
        $wishlist = $user->wishlist()
                        ->with('items.product')
                        ->first();

        //ak pouzivatel nema wishlist tak posleme prazdnu kolekciu
        if(!$wishlist){
            $produkty = new \Illuminate\Pagination\LengthAwarePaginator([], 0, 6);
        } 
        else{
            $produkty = \App\Models\Produkt::whereIn('id', $wishlist->items->pluck('product_id'))
                        ->paginate(6);
        }
        return view('profile/profileFavourites', compact('produkty'));
    }

    public function removeFromWishlist($id)
    {
        $user = Auth::user();
        $wishlist = \App\Models\Wishlist::where('user_id', $user->id)->first();
        if($wishlist){
            //vymazeme dany produkt z wishlistu
            \DB::table('wishlist_polozka')
                ->where('wishlist_id', $wishlist->id)
                ->where('product_id', $id)
                ->delete();
            return back()->with('success', 'Produkt bol odstránený z obľúbených.');
        }
        return back()->withErrors('Wishlist nebol nájdený.');
    }

    public function addToWishlist(Request $request)
    {
        $user = Auth::user();
        $productId = $request->product_id;
        $wishlist = \DB::table('wishlist')->updateOrInsert(
            ['user_id' => $user->id],
            ['last_update' => now()]
        );
        //zistime si id a ci uz je vo wishliste
        $wishlistId = \DB::table('wishlist')->where('user_id', $user->id)->value('id');
        $exists = \DB::table('wishlist_polozka')
            ->where('wishlist_id', $wishlistId)
            ->where('product_id', $productId)
            ->exists();
        if(!$exists){
            //pridame ho ak neni v wishliste uz 
            \DB::table('wishlist_polozka')->insert([
                'wishlist_id' => $wishlistId,
                'product_id' => $productId
            ]);
            return back()->with('success', 'Produkt bol pridaný do obľúbených!');
        }
        return back()->with('info', 'Tento produkt už máte v obľúbených.');
    }
}