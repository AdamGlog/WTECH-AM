<?php
namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreUser;
use App\Services\UserService;

class PouzivatelController extends Controller
{
    // Nacita a vylistuje všetkých užívateľov z DB
    public function listUsers()
    {
        $users = User::all();
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
        // validacia by mala byt skor v service (alebo policies), potom presunut
        // $validated = $request->validate([
        //     'meno'        => 'required|string|max:20',
        //     'priezvisko'  => 'required|string|max:20',
        //     'nickname'    => 'required|string|max:30|unique:pouzivatelia,nickname',
        //     'email'       => 'required|email|unique:pouzivatelia,email',
        //     'heslo'       => 'required|min:6',
        //     'telefonne_cislo' => 'nullable|string|max:20',
        // ]);

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

    public function store(StoreUser $request, UserService $userService)
    {
        // Validované dáta dostaneš cez $request->validated()
        $userService->createUser($request->validated());

        return back()->with('success', 'Užívateľ bol úspešne pridaný cez Service');
    }

    // Update daneho usera, najprv najde, potom zmeni
    public function update(Request $request, $id)
    {
        $user = User::find($id);
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
        $user = User::find($id);
        $user->delete();
        return redirect('/adminUsers');
    }
}