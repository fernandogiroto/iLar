<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Speciality extends Model
{
    public $table = 'specialities';

    public $fillable = ['name'];


    /**
     * Get all of the posts that are assigned this tag.
     */
    public function doctors()
    {
        return $this->morphedByMany(Doctor::class, 'specialityable', 'specialities_associations');
    }

    /**
     * Get all of the videos that are assigned this tag.
     */
    public function clinics()
    {
        return $this->morphedByMany(Speciality::class, 'specialityable', 'specialities_associations');
    }
}
