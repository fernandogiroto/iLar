<?php

namespace App\Http\Controllers;

use App\Http\Requests\doctor\StoreDoctorRequest;
use App\Http\Requests\Doctor\UpdateDoctorRequest;
use App\Models\Doctor;
use App\Services\Doctor\DoctorGet;
use App\Services\Doctor\DoctorCreate;
use App\Services\Doctor\DoctorUpdate;
use App\Services\Doctor\DoctorDelete;
use Exception;

class DoctorController extends Controller
{

    public function __construct(
        DoctorCreate $doctorCreateService,
        DoctorGet $doctorGet,
        DoctorUpdate $doctorUpdate,
        DoctorDelete $doctorDelete)
    {
        $this->doctorCreateService  = $doctorCreateService;
        $this->doctorGet            = $doctorGet;
        $this->doctorUpdate         = $doctorUpdate;
        $this->doctorDelete         = $doctorDelete;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $doctors = $this->doctorGet->execute();
         return response()->json($doctors);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\StoreDoctorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDoctorRequest $request)
    {
        try {
            $doctor = $this->doctorCreateService->execute($request);
            return response()->json([ 'doctor' => $doctor, 'success' => true]);
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
