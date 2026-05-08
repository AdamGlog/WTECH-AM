<?php
namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PouzivatelController extends Controller
{

    // Presmeruje na registraciu
    public function register()
    {
        return view('profile/registration');
    }

    // Vytvori noveho uzivatela do DB
    public function create(Request $request)
    {

        $user = User::create([
            'meno'             => $request['meno'],
            'priezvisko'       => $request['priezvisko'],
            'nickname'         => $request['nickname'],
            'email'            => $request['email'],
            'heslo'            => $request['heslo'], 
            'datum_registracie'=> now()->toDateString(),
            'typ_clena'        => 1,
            'telefonne_cislo'  => $request['telefonne_cislo'] ?? null,
            'ulica'            => $request->ulica,
            'cislo_domu'       => $request->cislo_domu,
            'mesto_psc'        => $request->mesto_psc,
        ]);

        Auth::login($user);   // automaticky prihlási po registrácii

        return redirect('/profileOverview');
    }
}