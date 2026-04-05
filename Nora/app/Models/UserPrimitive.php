<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserPrimitive extends Model
{
    protected $table = 'users';
    public $timestamps = false; //zatial neukladame kedy vytvarame upravujeme usera

    protected $fillable = [
        'meno', 'priezvisko', 'telefonne_cislo', 'email',
        'datum_registracie', 'typ_clena', 'nickname',
        'ulica', 'cislo_domu', 'mesto_psc', 'heslo'
    ];
}
