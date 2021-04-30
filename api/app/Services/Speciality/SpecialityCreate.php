<?php

namespace App\Services\Speciality;

use App\Http\Requests\Speciality\StoreSpecialityRequest;
use App\Interfaces\Speciality\iSpecialityCreate;
use App\Models\Speciality;

class SpecialityCreate implements iSpecialityCreate {
    public function execute(StoreSpecialityRequest $request) {
        $speciality = Speciality::create($request->all());
        return $speciality;
    }
}