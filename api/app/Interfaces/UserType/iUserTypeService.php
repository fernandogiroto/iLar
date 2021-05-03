<?php

namespace App\Interfaces\UserType;

use App\Models\UserType;
use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\UserType\UserTypeRequest;

interface iUserTypeService
{
    function getAll();
    function show(UserType $user_type);
    function store(UserTypeRequest $request);
    function update(UserTypeRequest $request,  UserType $user_type);
    function delete(UserType $user_type);

}
