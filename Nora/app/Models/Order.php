<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $casts = [
        'stav'              => StavObjednavky::class,
        'typ_platby'        => TypPlatby::class,
        'typ_dorucenia'     => TypDorucenia::class,
        'zaplatene_kedy'    => 'datetime',
        'odoslane_kedy'     => 'datetime',
        'doručene_kedy'     => 'datetime',
    ];

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
