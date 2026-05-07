<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

#[Fillable(['profilovka_url','meno','priezvisko','heslo','telefonne_cislo','email','datum_registracie',
    'typ_clena', 'nickname','ulica','cislo_domu','mesto_psc',])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'pouzivatelia';

    public $timestamps = true;


    /**
     * Typy atribútov (casting) meni zo stringov na ine datove typy
     */
    protected function casts(): array
    {
        return [
            'datum_registracie' => 'date',    
            'typ_clena'         => 'integer',
            'mesto_psc'         => 'integer',
            'created_at'        => 'datetime',
            'updated_at'        => 'datetime',
            'heslo' => 'hashed', 
        ];
    }

    /**
     * Overenie, či je používateľ administrátor
     */
    public function isAdmin(): bool
    {
        return $this->typ_clena === 6;
    }
    /**
     * Laravel bude brať nickname z tohto stĺpca (namiesto 'username')
     */
    public function username()
    {
        return 'nickname';
    }

    /**
     * Laravel bude brať heslo z tohto stĺpca (namiesto 'password')
     */
    public function getAuthPassword()
    {
        return $this->heslo;
    }

    //vztahy na ciselnikovu tabulku s mestami s psc a typom clena
    public function mesto(){
        return $this->belongsTo(MestoSPSC::class, 'mesto_psc', 'id');
    }
    public function typClena(){
        return $this->belongsTo(UrovneClenov::class, 'typ_clena', 'id');
    }
}