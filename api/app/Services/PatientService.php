<?php


namespace App\Services;

use App\Http\Requests\PatientRequest;
use App\Interfaces\iPatientService;
use App\Models\Patient;

class PatientService implements iPatientService
{

    function getAll()
    {
        $patients = Patient::with('user')->get();
        return $patients;
    }

    function show(Patient $patient) {
        return $patient->load('user');
    }

    function store(PatientRequest $request) {
        $patient = Patient::create($request->all());
        return $patient->load('user');
    }

    function update(PatientRequest $request, Patient $patient) {
        $patient->update($request->all());
        return $patient->load ('user');
        
    }

    function delete(Patient $patient) {
        $patient->delete();
        return true;
    }
}
