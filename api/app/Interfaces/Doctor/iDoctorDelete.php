<?php

namespace App\Interfaces\Doctor;

use App\Models\Doctor;

interface iDoctorDelete {
    function execute(Doctor $doctor);
}
