<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Clinic extends Model
{
    protected $fillable = [
        'name', 'address', 'zipcode', 'locality', 'phone'
    ];

    public function specialities() 
    {
        return $this->morphToMany(Speciality::class, 'specialityable', 'specialities_associations');
    }
}
