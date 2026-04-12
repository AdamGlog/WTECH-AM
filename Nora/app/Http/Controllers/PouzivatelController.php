<?php
namespace App\Http\Controllers;
use App\Models\Pouzivatel;
use Illuminate\Http\Request;

class PouzivatelController extends Controller
{
    // Nacita a vylistuje všetkých užívateľov z DB
    public function listUsers()
    {
        $users = Pouzivatel::all(); 
        return view('admin/adminUsers', ['users' => $users]);
    }

    // Presmeruje na registraciu
    public function register()
    {
        return view('profile/registration');
    }

    // Vytvori noveho uzivatela do DB
    public function create(Request $request)
    {
        $user = Pouzivatel::create([
            'meno'             => $request->meno,
            'priezvisko'       => $request->priezvisko,
            'telefonne_cislo'  => $request->telefonne_cislo,
            'email'            => $request->email,
            'heslo'            => $request->heslo,
            'datum_registracie'=> now()->toDateString(),
            'typ_clena'        => 1,
            'nickname'         => $request->nickname,
            'ulica'            => $request->ulica,
            'cislo_domu'       => $request->cislo_domu,
            'mesto_psc'        => $request->mesto_psc,
        ]);
        session(['user_id' => $user->id]);
        return redirect('/profileOverview');
    }

    // TODO: treba upravit - Otvori modalne okno
    public function edit($id)
    {
        // $user = Pouzivatel::find($id);
        // return view('admin/adminUserEdit', ['user' => $user]);
    }

    // Update daneho usera, najprv najde, potom zmeni
    public function update(Request $request, $id)
    {
        $user = Pouzivatel::find($id);
        $user->meno = $request->meno;
        $user->priezvisko = $request->priezvisko;
        $user->telefonne_cislo = $request->telefonne_cislo;
        $user->email = $request->email;
        $user->ulica = $request->ulica;
        $user->cislo_domu = $request->cislo_domu;
        $user->mesto_psc = $request->mesto_psc;
        $user->save();
        return redirect('/adminUsers');
    }

    // Vymaze uzivatela podla id
    public function delete($id)
    {
        $user = Pouzivatel::find($id);
        $user->delete();
        return redirect('/adminUsers');
    }
}