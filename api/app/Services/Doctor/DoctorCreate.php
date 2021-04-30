<?php

namespace App\Services\Doctor;

use App\Http\Requests\doctor\StoreDoctorRequest as DoctorStoreDoctorRequest;
use App\Http\Requests\StoreDoctorRequest;
use App\Interfaces\Doctor\iDoctorCreate;
use App\Models\Doctor;

class DoctorCreate implements iDoctorCreate {
    public function execute(DoctorStoreDoctorRequest $request)
    {

        $doctor = Doctor::create(['user_id' => $request->user_id]);
        return $doctor->load('user');
    }
}
