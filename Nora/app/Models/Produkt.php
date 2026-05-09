<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Produkt extends Model
{
    protected $table = 'produkty';

    protected $fillable = ['meno', 'cena', 'hodnotenie', 'pocet_na_sklade', 'obrazok', 'kategoria_id', 'typ','popis', 'info', 'doplnkove_info'];

    public function category(){
        return $this->belongsTo(Kategoria::class, 'kategoria_id');
    }

    public function obrazky(){
        return $this->hasMany(ProduktObrazok::class, 'produkt_id');
    }
}