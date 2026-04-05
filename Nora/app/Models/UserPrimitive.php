<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserPrimitive extends Model
{
    protected $table = 'users';
    public $timestamps = false; //zatial neukladame kedy vytvarame upravujeme usera
}
