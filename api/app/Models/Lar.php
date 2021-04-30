<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lar extends Model
{
    public $table = 'lares';

    protected $fillable = [ 'name', 'address', 'zipcode', 'locality', 'phone', 'active' ];
}
