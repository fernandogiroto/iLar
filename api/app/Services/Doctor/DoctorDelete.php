<?php

namespace App\Services\Doctor;

use App\Interfaces\Doctor\iDoctorDelete;
use App\Models\Doctor;

class DoctorDelete implements iDoctorDelete {
    function execute(Doctor $doctor)
    {
        return $doctor->delete();
    }
}
