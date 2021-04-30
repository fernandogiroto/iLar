<?php


namespace App\Interfaces\Clinic;

use App\Models\Clinic;

interface iClinicDelete
{
    function execute(Clinic $clinic);
}
