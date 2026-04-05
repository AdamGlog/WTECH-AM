<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // Získame údaje z formulára
        $nickname = $request->input('nickname');
        $password = $request->input('password');

        // Hľadáme používateľa podľa nickname
        $user = User::where('nickname', $nickname)->first();

        // Porovnanie hesla
        if ($user && $user->password === $password) {
            // Úspešné prihlásenie → presmerovanie na profil
            return redirect()->route('profileOverview');
        }

        // Neúspešné prihlásenie → späť s chybou
        return redirect()->back()->withErrors([
            'nickname' => 'Nesprávny nickname alebo heslo.'
        ])->withInput();
    }
}