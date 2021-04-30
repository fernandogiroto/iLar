<?php


namespace App\Services\Clinic;

use App\Interfaces\Clinic\iGetClinics;
use App\Models\Clinic;

class ClinicGet implements iGetClinics
{

    function execute()
    {
        $clinics = Clinic::all();
        return $clinics;
    }
}
