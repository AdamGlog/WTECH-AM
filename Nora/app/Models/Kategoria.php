<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Kategoria extends Model
{
    protected $table = 'kategoria';

    protected $fillable = ['meno', 'pocet_produktov'];

    public function products(){
        return $this->hasMany(Produkt::class, 'kategoria_id');
    }
}