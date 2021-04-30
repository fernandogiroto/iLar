<?php

namespace App\Services\Clinic;

use App\Http\Requests\Clinic\StoreClinicRequest;
use App\Interfaces\Clinic\iClinicCreate;
use App\Models\Clinic;

class ClinicCreate implements iClinicCreate
{

    function execute(StoreClinicRequest $request)
    {
        // TODO: Implement execute() method.
        $clinic = Clinic::create($request->all());
        return $clinic;
    }
}
