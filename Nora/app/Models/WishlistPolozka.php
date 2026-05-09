<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WishlistPolozka extends Model
{
    protected $table = 'wishlist_polozka';
    
    public function product()
    {
        return $this->belongsTo(Produkt::class, 'product_id');
    }
}
