<?php


namespace App\Services\UserType;

use App\Interfaces\UserType\iUserTypeService;
use App\Models\UserType;
use App\Http\Requests\UserType\UserTypeRequest;


class UserTypeService implements iUserTypeService
{

    function getAll()
    {
        $user_types = UserType::all();
        return $user_types;
    }

    function show(User $user) {
        return $user;
    }

    function store(StoreUserRequest $request) {
        $user = User::create($request->all());
        return $user;
    }

    function update(StoreUserRequest $request, User $user) {
        $user = $user->update($request->all());
        return $user;
        
    }

    function delete(User $user) {
        $user->delete();
        return true;
    }
}
