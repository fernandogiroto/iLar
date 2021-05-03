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

    function show(UserType $user_type) {
        return $user_type;
    }

    function store(UserTypeRequest $request) {
        $user_type = UserType::create($request->all());
        return $user_type;
    }

    function update(UserTypeRequest $request, UserType $user_type) {
        $user_type->update($request->all());
        return $$user_type;
        
    }

    function delete( UserType $user_type) {
        $user_type->delete();
        return true;
    }
}
