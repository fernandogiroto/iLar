<?php


namespace App\Interfaces\Clinic;

use App\Models\Clinic;


use App\Http\Requests\Clinic\StoreClinicRequest;

interface iClinicUpdate
{
    function execute(StoreClinicRequest $request, Clinic $clinic);
}
