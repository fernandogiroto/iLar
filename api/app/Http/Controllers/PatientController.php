<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\PatientRequest;
use App\Services\PatientService;
use App\Models\Patient;
use Exception;

class PatientController extends Controller
{
    public function __construct( PatientService $patientService ) 
    {
        // This is dependency injection
        $this->patientService = $patientService;
    }

    public function index() {
        try {
            $patients = $this->patientService->getAll();
            return response()->json( [ 'patients' => $patients, 'success' => true ] );
        } catch (Exception $e) {
            return response()->json( [ 'success' => false, 'error' => $e->getMessage()] );
        }
    }

    public function store(PatientRequest $request) {
        try {
            $patient = $this->patientService->store($request);
            return response()->json([ 'patient' => $patient, 'success' => true]);
        } catch (Exception $e) {
            return response()->json( [ 'success' => false, 'error' => $e->getMessage()] );
        }
    }

    public function show(Patient $patient) {
        return response()->json([ 'patient' => $patient->load('user')]);
    }

    public function update(PatientRequest $request, patient $patient) {
      
        try {
            $patient = $this->patientService->update($request, $patient);
            return response()->json([ 'patient' => $patient, 'success' => true]);
        } catch (Exception $e) {
            return response()->json( [ 'success' => false, 'error' => $e->getMessage()] );
        }
    }

    public function destroy(patient $patient){
        try {
            $this->patientService->delete($patient);
            return response()->json(['success' => true]);
        } catch (Exception $e) {
            return response()->json( ['success' => false, 'error' => $e->getMessage()] );
        }
    }
}
