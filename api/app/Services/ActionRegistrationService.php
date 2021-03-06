<?php

namespace App\Services;

use App\Http\Requests\ActionRegistrationRequest;
use App\Interfaces\iActionRegistration;
use App\Models\Action;
use App\Models\ActionRegistration;
use App\User;
use Illuminate\Support\Facades\Auth;

class ActionRegistrationService implements iActionRegistration
{
    function show(ActionRegistration $actionRegistration){
        return $actionRegistration;
    }
    
    function getAll()
    {
        $actionRegistrations = ActionRegistration::with('action', 'authors', 'receptors')->get();
        return $actionRegistrations;
    }
    
    function store(ActionRegistrationRequest $request) {

        $action = Action::find($request->action_id);
        $authors_ids = json_decode($request->authors_ids);
        $receptors_ids = json_decode($request->receptors_ids);
        

        $registration = ActionRegistration::create( [
            'action_id'     => $action->id,
            'extraData'     => $request->extraData ? json_encode($request->extraData) : null,
            'scheduled_to'  => $request->scheduled_to,
            'executed'      => $request->executed ? $request->executed : 1,
            'executed_at'   => $request->executed_at ? $request->executed_at : null,
            'notes'         => $request->notes ? $request->notes : null,
            'created_by'    => Auth::user()->id
        ]);

        $registration->authors()->sync($authors_ids);
        $registration->receptors()->sync($receptors_ids);

        return $registration->load('action', 'authors', 'receptors');
    }
    
    function update(ActionRegistrationRequest $request, ActionRegistration $action_registration) {
        $action_registration->update( [
            'action_id' => $request->action_id,
        ]);

        $action_registration->authors()->sync($request->authors_ids);
        $action_registration->receptors()->sync($request->authors_ids);
        return $action_registration->load('action', 'authors', 'receptors');
    }
    
    function delete(ActionRegistration $actionRegistration) {
        $actionRegistration->delete();
        return $actionRegistration;
    }
}