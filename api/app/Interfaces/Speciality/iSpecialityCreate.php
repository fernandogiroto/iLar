<?php

namespace App\Interfaces\Speciality;

use App\Http\Requests\Speciality\StoreSpecialityRequest;

interface iSpecialityCreate {
    function execute(StoreSpecialityRequest $request);
}