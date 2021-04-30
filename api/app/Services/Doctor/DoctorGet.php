<?php

namespace App\Services\Doctor;

use App\Interfaces\Doctor\iGetDoctors;
use App\Models\Doctor;

class DoctorGet implements iGetDoctors {
    public function execute() {
        $doctors = Doctor::with('user')->get();
        return $doctors;
    }
}
