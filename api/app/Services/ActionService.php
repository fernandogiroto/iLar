<?php

namespace App\Services;

use App\Http\Requests\ActionRequest;
use App\Interfaces\iActionService;
use App\Models\Action;

class ActionService implements iActionService
{
    function show(Action $action){
        return $action;
    }
    
    function getAll()
    {
        $actions = Action::with('registrations')->get();
        return $actions;
    }
    
    function store(ActionRequest $request) {
        $action = Action::create($request->all());
        return $action;
    }
    
    function update(ActionRequest $request, Action $action) {
        $action->update( $request->all() );
        return $action;
    }
    
    function delete(Action $action) {
        $action->delete();
        return $action;
    }
}