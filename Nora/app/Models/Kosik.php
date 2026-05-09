<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kosik extends Model
{
    protected $table = 'kosik';
    protected $fillable = ['pouzivatel_id', 'posledny_update'];
    public $timestamps = false; //nevyuzivame createdAt a updatedAt
    
    public function polozky()
    {
        return $this->hasMany(KosikPolozka::class, 'kosik_id');
    }
}
