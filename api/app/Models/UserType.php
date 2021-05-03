<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserType extends Model
{
    public $table = 'users_types';

    public $fillable = ['name', 'active'];

    /**
     * Get the users with this user type.
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
