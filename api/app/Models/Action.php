<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\User;

class Action extends Model
{
    public $table = 'actions';

    protected $fillable = ['name', 'is_active'];

    

    public function registrations() {
        return $this->hasMany(ActionRegistration::class);

    }
}
