<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MestoSPSC extends Model
{
    protected $table = 'mesta_s_psc';
    protected $fillable = ['mesto', 'psc', 'krajina'];
}
