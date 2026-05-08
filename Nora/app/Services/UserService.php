<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Storage;

class UserService
{
    // Biznis logika pri vytvarani Uzivatela
    public function createUser(array $data): User
    {
        // Spracovanie dat pred ulozenim
        $data['datum_registracie'] = now();

        // Osetrenie obrazka (ak bol nahrany)
        // if (isset($data['profilovka_url'])) {
        //     $path = $data['profilovka_url']->store('profiles', 'public');
        //     $data['profilovka_url'] = $path;
        // }

        return User::create($data);
    }

    public function updateUser(User $user, array $data): bool
    {
        // Spracovanie hesla - len ak bolo zadané
        if (empty($data['heslo'])) {
            unset($data['heslo']);
        }

        // Spracovanie obrázka
        // if (isset($data['profilovka_url'])) {
        //     if ($user->profilovka_url) {
        //         Storage::disk('public')->delete($user->profilovka_url);
        //     }
        //     $data['profilovka_url'] = $data['profilovka_url']->store('profiles', 'public');
        // }

        return $user->update($data);
    }

    public function deleteUser(User $user): bool
    {
        // if ($user->profilovka_url) {
        //     Storage::disk('public')->delete($user->profilovka_url);
        // }
        return $user->delete();
    }
}