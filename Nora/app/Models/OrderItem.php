<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class OrderItem extends Model
{
    protected $table = 'objednavka_polozka';
    protected $fillable = ['order_id', 'product_id', 'pocet'];

    public function order(){
        return $this->belongsTo(Order::class, 'order_id');
    }

    public function product(){
        return $this->belongsTo(Produkt::class, 'product_id');
    }
}
