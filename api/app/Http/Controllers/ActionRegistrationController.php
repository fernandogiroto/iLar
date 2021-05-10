<?php

namespace App\Http\Controllers;

use App\Http\Requests\ActionRegistrationRequest;
use Illuminate\Http\Request;
use Exception;
use App\Services\ActionRegistrationService;
use App\Models\Action;
use App\Models\ActionRegistration;
use App\User;

class ActionRegistrationController extends Controller
{
    public $actionRegistrationService;

    public function __construct(ActionRegistrationService $actionRegistrationService) {
        $this->actionRegistrationService = $actionRegistrationService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $registrations = $this->actionRegistrationService->getAll();
            return response()->json( [ 'registrations' => $registrations, 'success' => true ] );
        } catch (Exception $e) {
            return response()->json( [ 'success' => false, 'error' => $e->getMessage()] );
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ActionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ActionRegistrationRequest $request)
    {
        try {  
            $registration = $this->actionRegistrationService->store( $request );
            return response()->json( [ 'registration' => $registration, 'success' => true ] );
        } catch (Exception $e) {
            return response()->json( [ 'success' => false, 'error' => $e->getMessage()] );
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  ActionRegistration $registration
     * @return \Illuminate\Http\Response
     */
    public function show(ActionRegistration $registration)
    {
        try {
            $registration = $registration->with('authors', 'receptors' , 'action');
            return response()->json( [ 'registration' => $registration, 'success' => true ] );
        } catch (Exception $e) {
            return response()->json( [ 'success' => false, 'error' => $e->getMessage()] );
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ActionRequest  $request
     * @param  \App\Models\Action  $action
     * @return \Illuminate\Http\Response
     */
    public function update(ActionRegistrationRequest $request, ActionRegistration $action)
    {
        try {
            $action = $this->actionRegistrationService->update($request, $action);
            return response()->json( [ 'action' => $action, 'success' => true ] );
        } catch (Exception $e) {
            return response()->json( [ 'success' => false, 'error' => $e->getMessage()] );
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  ActionRegistration  $registration
     * @return \Illuminate\Http\Response
     */
    public function destroy(ActionRegistration $registration)
    {
        try {
            $this->actionRegistrationService->delete($registration);
            return response()->json([ 'success' => true ]);
        } catch (Exception $e) {
            return response()->json( [ 'success' => false, 'error' => $e->getMessage()] );
        }
    }
}
