<?php

namespace App\Http\Controllers;

use App\Models\UserPrimitive;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Nacita a vylistuje všetkých užívateľov z DB
    public function listUsers()
    {
        $users = UserPrimitive::all(); 
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
        UserPrimitive::create([
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

        return redirect('/adminUsers');
    }

    // TODO: treba upravit Otvori modalne okno
    public function edit($id)
    {
        // $user = UserPrimitive::find($id);
        // return view('admin.adminUserEdit', ['user' => $user]);
    }

    // Update daneho usera, najprv najde, potom zmeni
    public function update(Request $request, $id)
    {
        $user = UserPrimitive::find($id);
        $user->meno            = $request->meno;
        $user->priezvisko      = $request->priezvisko;
        $user->telefonne_cislo = $request->telefonne_cislo;
        $user->email           = $request->email;
        $user->ulica           = $request->ulica;
        $user->cislo_domu      = $request->cislo_domu;
        $user->mesto_psc       = $request->mesto_psc;
        $user->save();

        return redirect('/adminUsers');
    }

    // Vymaze uzivatela podla id
    public function delete($id)
    {
        $user = UserPrimitive::find($id);
        $user->delete();
        return redirect('/adminUsers');
    }
}
