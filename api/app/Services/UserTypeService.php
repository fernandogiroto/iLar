<?php


namespace App\Services;

use App\Interfaces\iUserTypeService;
use App\Models\UserType;
use App\Http\Requests\UserTypeRequest;


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
        return $user_type;
        
    }

    function delete( UserType $usertype) {
        $usertype->delete();
        return true;
    }
}
