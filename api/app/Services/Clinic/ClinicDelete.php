<?php


namespace App\Services\Clinic;

use App\Interfaces\Clinic\iClinicDelete;
use App\Models\Clinic;

class ClinicDelete implements iClinicDelete
{

    function execute(Clinic $clinic)
    {
        return $clinic->delete();
    }
}
