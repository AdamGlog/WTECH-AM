<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KosikPolozka extends Model
{
    protected $table = 'kosik_polozka';
    protected $fillable = ['kosik_id', 'produkt_id', 'pocet_ks'];
}
