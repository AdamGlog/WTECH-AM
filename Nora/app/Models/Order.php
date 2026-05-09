<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Enums\StavObjednavky; 
use App\Enums\TypPlatby;
use App\Enums\TypDorucenia;

class Order extends Model
{
    protected $table = 'objednavky';

    protected $fillable = [
        'user_id', 'typ_platby', 'stav', 'typ_dorucenia',
        'celkova_cena', 'adresa_dorucenia', 'datum_objednania'
    ];

    protected $casts = [
        'stav'              => StavObjednavky::class,
        'typ_platby'        => TypPlatby::class,
        'typ_dorucenia'     => TypDorucenia::class,
        'datum_objednania'  => 'datetime',
        'celkova_cena'      => 'float',
    ];

    public function items()
    {
        return $this->hasMany(OrderItem::class, 'order_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
