<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kosik extends Model
{
    protected $table = 'kosik';
    protected $fillable = ['pouzivatel_id'];
}
