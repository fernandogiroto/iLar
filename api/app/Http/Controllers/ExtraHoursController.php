<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ExtraHourRequest;
use App\Models\ExtraHours;
use App\Services\ExtraHoursService;
use App\User;
use Exception;

class ExtraHoursController extends Controller
{

    public function __construct(ExtraHoursService $extraHoursService) {
        $this->extraHoursService = $extraHoursService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        try {
            $extra_hours = $this->extraHoursService->getAll();
            return response()->json( [ 'extra_hours' => $extra_hours, 'success' => true ] );
        } catch (Exception $e) {
            return response()->json( [ 'success' => false, 'error' => $e->getMessage()] );
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ExtraHourRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ExtraHourRequest $request)
    {
        try {
            $extra_hours = $this->extraHoursService->store($request);
            return response()->json( [ 'extra_hours' => $extra_hours->load('user'), 'success' => true ] );
        } catch (Exception $e) {
            return response()->json( [ 'success' => false, 'error' => $e->getMessage()] );
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(ExtraHours $extra_hours)
    {
        return response()->json( ['extra_hours' => $extra_hours, 'success' => true] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ExtraHourRequest $request
     * @param  ExtraHours $extra_hours
     * @return \Illuminate\Http\Response
     */
    public function update(ExtraHourRequest $request, ExtraHours $extra_hours)
    {
        try {
            $extra_hours = $this->extraHoursService->update($request, $extra_hours);
            return response()->json( [ 'extra_hours' => $extra_hours, 'success' => true ] );
        } catch (Exception $e) {
            return response()->json( [ 'success' => false, 'error' => $e->getMessage()] );
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  ExtraHours $extra_hours
     * @return \Illuminate\Http\Response
     */
    public function destroy(ExtraHours $extra_hours)
    {
        try {
            $extra_hours = $this->extraHoursService->delete($extra_hours);
            return response()->json( [ 'success' => true ] );
        } catch (Exception $e) {
            return response()->json( [ 'success' => false, 'error' => $e->getMessage()] );
        }  
    }

    public function getExtraHourByUser(User $user, int $month) {
        dd($user, $month);
    }
}
