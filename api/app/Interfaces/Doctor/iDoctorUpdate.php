<?php

namespace App\Interfaces\Doctor;

use App\Http\Requests\Doctor\UpdateDoctorRequest;
use App\Models\Doctor;

interface iDoctorUpdate {
    function execute(UpdateDoctorRequest $request, Doctor $doctor);
}
