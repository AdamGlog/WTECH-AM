<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    protected $table = 'wishlist';
    
    public function items()
    {
        return $this->hasMany(WishlistPolozka::class, 'wishlist_id');
    }
}
