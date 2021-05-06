<?php


namespace App\Services\User;

use App\Interfaces\User\iUserService;
use App\User;
use App\Http\Requests\User\StoreUserRequest;


class UserService implements iUserService
{

    function getAll()
    {
        $users = User::with('user_type')->get();
        return $users;
    }

    function show(User $user) {
        return $user;
    }

    function store(StoreUserRequest $request) {
        $user = User::create($request->all());
        return $user->with('user_type');
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
