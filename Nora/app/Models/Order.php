<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Enums\StavObjednavky; 
use App\Enums\TypPlatby;
use App\Enums\TypDorucenia;

class Order extends Model
{
    protected $table = 'objednavky';

    protected $casts = [
        'stav'              => StavObjednavky::class,
        'typ_platby'        => TypPlatby::class,
        'typ_dorucenia'     => TypDorucenia::class,
        'datum_objednania'  => 'datetime',
        'celkova_cena'      => 'float',
    ];

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
