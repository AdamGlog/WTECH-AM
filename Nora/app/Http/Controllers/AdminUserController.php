<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\StoreUser;
use App\Http\Requests\UpdateUser;
use App\Services\UserService;

class AdminUserController extends Controller
{
    
    // Nacita a vylistuje všetkých užívateľov z DB
    public function index()
    {
        $users = User::all();
        return view('admin/adminUsers', ['users' => $users]);
    }

    public function store(StoreUser $request, UserService $userService)
    {
        // Validované dáta dostaneš cez $request->validated()
        $userService->createUser($request->validated());

        return back()->with('success', 'Užívateľ bol úspešne pridaný cez Service');
    }

    public function update(UpdateUser $request, User $user, UserService $userService)
    {
        $userService->updateUser($user, $request->validated());
        return back()->with('success', 'Užívateľ bol upravený.');
    }

    public function delete(User $user, UserService $userService)
    {
        if (auth()->id() === $user->id) {
            return back()->with('error', 'Nemôžete vymazať sami seba!');
        }

        $userService->deleteUser($user);
        return back()->with('success', 'Užívateľ bol zmazaný.');
    }
}
