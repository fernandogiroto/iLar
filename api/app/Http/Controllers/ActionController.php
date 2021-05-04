<?php

namespace App\Http\Controllers;

use App\Http\Requests\Action\ActionRequest;
use App\Models\Action;
use App\Services\Action\ActionService;
use Illuminate\Http\Request;
use Exception;

class ActionController extends Controller
{
    public $actionService;

    public function __construct(ActionService $actionService) {
        $this->actionService = $actionService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $actions = $this->actionService->getAll();
            return response()->json( [ 'actions' => $actions, 'success' => true ] );
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
    public function store(ActionRequest $request)
    {
        try {
            $action = Action::create( $request->all() );
            return response()->json( [ 'action' => $action, 'success' => true ] );
        } catch (Exception $e) {
            return response()->json( [ 'success' => false, 'error' => $e->getMessage()] );
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Action  $action
     * @return \Illuminate\Http\Response
     */
    public function show(Action $action)
    {
        try {
            return response()->json( [ 'action' => $action, 'success' => true ] );
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
    public function update(ActionRequest $request, Action $action)
    {
        try {
            $action = $this->actionService->update($request, $action);
            return response()->json( [ 'action' => $action, 'success' => true ] );
        } catch (Exception $e) {
            return response()->json( [ 'success' => false, 'error' => $e->getMessage()] );
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Action  $action
     * @return \Illuminate\Http\Response
     */
    public function destroy(Action $action)
    {
        try {
            $this->actionService->delete($action);
            return response()->json([ 'success' => true ]);
        } catch (Exception $e) {
            return response()->json( [ 'success' => false, 'error' => $e->getMessage()] );
        }
    }
}
