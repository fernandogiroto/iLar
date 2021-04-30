<?php

namespace App\Http\Controllers;

use App\Http\Requests\Clinic\StoreClinicRequest;
use App\Interfaces\Clinic\iClinicDelete;
use App\Services\Clinic\ClinicCreate;
use App\Services\Clinic\ClinicDelete;
use App\Services\Clinic\ClinicGet;
use App\Services\Clinic\ClinicUpdate;
use App\Models\Clinic;

use Exception;

class ClinicController extends Controller {

    /**
     * ClinicController constructor.
     * @param ClinicCreate $clinicCreate
     * @param ClinicGet $clinicGet
     * @param ClinicUpdate $clinicUpdate
     * @param ClinicDelete $clinicDelete
     */
    public function __construct(
        ClinicCreate $clinicCreate,
        ClinicGet $clinicGet,
        ClinicUpdate $clinicUpdate,
        ClinicDelete $clinicDelete
    ) {
        $this->clinicCreate = $clinicCreate;
        $this->clinicGet = $clinicGet;
        $this->clinicUpdate = $clinicUpdate;
        $this->clinicDelete = $clinicDelete;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clinics = $this->clinicGet->execute();
        return response()->json($clinics);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Requests\Clinic\StoreClinicRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClinicRequest $request)
    {
        try {
            $clinic = $this->clinicCreate->execute($request);
            return response()->json([ 'clinic' => $clinic, 'success' => true]);
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
     * @param  Clinic $clinic
     * @return \Illuminate\Http\Response
     */
    public function show(Clinic $clinic)
    {
        return response()->json( $clinic );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Requests\Clinic\StoreClinicRequest  $request
     * @param  Clinic $clinic
     * @return \Illuminate\Http\Response
     */
    public function update(StoreClinicRequest $request, Clinic $clinic)
    {
        try {
            $clinic = $this->clinicUpdate->execute($request, $clinic);
            return response()->json([
                'success' => true,
                'clinic' => $clinic
                ]);
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
     * @param  Clinic $clinic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Clinic $clinic)
    {
        try {
            $clinic = $this->clinicDelete->execute($clinic);
            return response()->json([ 'success' => true ]);
        } catch (Exception $e) {
            return response()->json(
                [ 'success' => false, 'error' => $e->getMessage()]
            );
        }
    }
}
