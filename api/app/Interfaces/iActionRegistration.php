<?php

namespace App\Interfaces;


use App\Http\Requests\ActionRegistrationRequest;
use App\Models\Action;
use App\Models\ActionRegistration;

interface iActionRegistration
{
    function getAll();
    function show(ActionRegistration $actionRegistration);
    function store(ActionRegistrationRequest $request);
    function update(ActionRegistrationRequest $request,  ActionRegistration $actionRegistration);
    function delete(ActionRegistration $actionRegistration);

}
