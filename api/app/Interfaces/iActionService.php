<?php

namespace App\Interfaces;


use App\Http\Requests\ActionRequest;
use App\Models\Action;

interface iActionService
{
    function getAll();
    function show(Action $action);
    function store(ActionRequest $request);
    function update(ActionRequest $request,  Action $action);
    function delete(Action $action);

}
