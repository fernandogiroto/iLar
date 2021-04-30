<?php

namespace App\Services\Speciality;

use App\Interfaces\Speciality\iGetSpeciality;
use App\Models\Speciality;

class SpecialityGet implements iGetSpeciality {
    public function execute()
    {
        $specialities = Speciality::all();
        return $specialities;
    }
}