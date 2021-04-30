<?php

namespace App\Interfaces\Doctor;

use App\Http\Requests\doctor\StoreDoctorRequest;

interface iDoctorCreate {
    function execute(StoreDoctorRequest $request);
}
