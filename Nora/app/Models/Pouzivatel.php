<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Pouzivatel extends Model
{
    protected $table = 'pouzivatelia';
    public $timestamps = true;

    protected $fillable = [
        'profilovka_url',
        'meno',
        'priezvisko',
        'heslo',
        'telefonne_cislo',
        'email',
        'datum_registracie',
        'typ_clena',
        'nickname',
        'ulica',
        'cislo_domu',
        'mesto_psc',
    ];

    //vztahy na ciselnikovu tabulku s mestami s psc a typom clena
    public function mesto(){
        return $this->belongsTo(MestoSPSC::class, 'mesto_psc', 'id');
    }
    public function typClena(){
        return $this->belongsTo(UrovneClenov::class, 'typ_clena', 'id');
    }
}