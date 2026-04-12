<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pouzivatel;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $nickname = $request->nickname;
        $heslo = $request->heslo;
        $user = Pouzivatel::where('nickname', $nickname)->first();

        if ($user && $user->heslo === $heslo) {
            // ulozim id
            session(['user_id' => $user->id]);
            return redirect('/profileOverview');
        }

        return redirect()->back()->withErrors([
            'nickname' => 'Zlé meno alebo heslo'
        ]);
    }

    public function profile()
    {
        $userId = session('user_id');

        if (!$userId) {
            return redirect('/');
        }

        $user = Pouzivatel::find($userId);
        return view('profile/profileOverview', ['user' => $user]);
    }

    public function logout()
    {
        session()->flush(); // vymaže celú session
        return redirect('/');
    }
}