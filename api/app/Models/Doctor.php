<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    public $table = 'doctors';

    public $fillable = ['user_id'];

    /**
     * Get the user that owns the phone.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function specialities() 
    {
        return $this->morphToMany(Speciality::class, 'specialityable', 'specialities_associations');
    }
}
