<?php

namespace App\Http\Controllers;

use App\Http\Requests\doctor\StoreDoctorRequest;
use App\Http\Requests\Doctor\UpdateDoctorRequest;
use App\Http\Requests\Speciality\StoreSpecialityRequest;
use App\Models\Doctor;
use App\Services\Doctor\DoctorGet;
use App\Services\Doctor\DoctorCreate;
use App\Services\Doctor\DoctorUpdate;
use App\Services\Doctor\DoctorDelete;
use App\Services\Speciality\SpecialityCreate;
use App\Services\Speciality\SpecialityGet;
use Exception;

class SpecialityController extends Controller
{

    public function __construct(
        SpecialityGet $specialityGet,
        SpecialityCreate $specialityCreate)
    {
        $this->specialityGet = $specialityGet;
        $this->specialityCreate = $specialityCreate;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $specialities = $this->specialityGet->execute();
         return response()->json($specialities);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\StoreSpecialityRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSpecialityRequest $request)
    {
        try {
            $speciality = $this->specialityCreate->execute($request);
            return response()->json([ 'speciality' => $speciality, 'success' => true]);
        } catch (Exception $e) {
            return response()->json(
                [ 'success' => false,
                    'error' => $e->getMessage()]
            );
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function show(Doctor $doctor)
    {
        return response()->json( $doctor->load('user') );
    }

    /**
     * Update the given user.
     *
     * @param  \Illuminate\Http\Requests\Doctor\UpdateDoctorRequest $request
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDoctorRequest $request, Doctor $doctor)
    {

        try {
            $doctor = $this->doctorUpdate->execute($request, $doctor);
            return response()->json([ 'doctor' => $doctor, 'success' => true]);
        } catch (Exception $e) {
            return response()->json(
                [ 'success' => false,
                    'error' => $e->getMessage()]
            );
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Doctor $doctor)
    {
        try {
            $clinic = $this->doctorDelete->execute($doctor);
            return response()->json([
                'success' => true
                ]);
        } catch (Exception $e) {
            return response()->json(
                [ 'success' => false,
                    'error' => $e->getMessage()]
            );
        }
    }
}
