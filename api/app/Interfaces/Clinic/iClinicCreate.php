<?php


namespace App\Interfaces\Clinic;


use App\Http\Requests\Clinic\StoreClinicRequest;

interface iClinicCreate
{
    function execute(StoreClinicRequest $request);
}
