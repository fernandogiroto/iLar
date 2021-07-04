<?php

namespace App\Interfaces;

use App\Models\Patient;
use App\Http\Requests\PatientRequest;

interface iPatientService
{
    function getAll();
    function show(Patient $patient);
    function store(PatientRequest $request);
    function update(PatientRequest $request,  Patient $patient);
    function delete(Patient $patient);

}
