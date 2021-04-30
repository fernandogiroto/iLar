<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\User;

class Action extends Model
{
    public $table = 'actions';

    protected $fillable = ['name', 'is_active'];

    public function authors() 
    {
        return $this->belongsToMany(User::class, 'action_has_authors');
    }

    public function receptors() {
        return $this->belongsToMany(User::class, 'action_has_receptors');
    }

    public function registrations() {
        return $this->hasMany(ActionRegistration::class);

    }
}
