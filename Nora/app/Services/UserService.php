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
}