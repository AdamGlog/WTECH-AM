<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Produkt extends Model
{
    protected $table = 'produkty';
    public function obrazky()
    {
        return $this->hasMany(ProduktObrazok::class, 'produkt_id');
    }
}