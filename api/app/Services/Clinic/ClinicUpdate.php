<?php

namespace App\Services\Clinic;

use App\Http\Requests\Clinic\StoreClinicRequest;
use App\Interfaces\Clinic\iClinicUpdate;
use App\Models\Clinic;

class ClinicUpdate implements iClinicUpdate
{

    function execute(StoreClinicRequest $request, Clinic $clinic)
    {
        $clinic->update($request->all());
        return $clinic;
    }
}
