<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;
class Patient extends Model
{
    public $table = 'patients';

    public $fillable = ['user_id'];

    /**
     * Get the user that owns the phone.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
