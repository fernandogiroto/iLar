<?php

namespace App\Interfaces;

use App\User;
use App\Http\Requests\StoreUserRequest;

interface iUserService
{
    function getAll();
    function show(User $user);
    function store(StoreUserRequest $request);
    function update(StoreUserRequest $request,  User $user);
    function delete(User $user);

}
