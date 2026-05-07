<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
            return redirect()->intended('/profileOverview');
        }

        return back()->withErrors([
            'nickname' => 'Zlé prihlasovacie údaje.',
        ])->onlyInput('nickname');
    }

//     public function login(Request $request)
// {
//     $credentials = $request->validate([
//         'nickname' => ['required', 'string'],
//         'heslo'    => ['required', 'string'],
//     ]);

//     $user = User::where('nickname', $credentials['nickname'])->first();

//     dd([
//         'nickname_zadany'     => $credentials['nickname'],
//         'user_najdeny'        => $user !== null,
//         'typ_clena'           => $user?->typ_clena,
//         'heslo_v_db'          => $user?->heslo,
//         'zadane_heslo'        => $credentials['heslo'],
//         'attempt_vysledok'    => Auth::attempt([
//             'nickname' => $credentials['nickname'], 
//             'password' => $credentials['heslo']
//         ])
//     ]);
// }

    public function profile()
    {
        if (!Auth::check()) {
            return redirect('/');
        }

        $user = Auth::user();
        return view('profile/profileOverview', ['user' => $user]);
    }

    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('/');
    }
}