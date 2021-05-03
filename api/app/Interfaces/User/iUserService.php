<?php

namespace App\Interfaces\User;

use App\User;
use App\Http\Requests\User\StoreUserRequest;

interface iUserService
{
    function getAll();
    function show(User $user);
    function store(StoreUserRequest $request);
    function update(StoreUserRequest $request,  User $user);
    function delete(User $user);

}
