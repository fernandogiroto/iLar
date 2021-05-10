<?php


namespace App\Services;

use App\Interfaces\iUserService;
use App\User;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Support\Facades\Hash;

class UserService implements iUserService
{

    function getAll()
    {
        $users = User::with('user_type')->get();
        return $users;
    }

    function show(User $user) {
        return $user->load('user_type');
    }

    function store(StoreUserRequest $request) {
        $request->password = Hash::make($request->password);
        $user = User::create($request->all());
        return $user->load('user_type');
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
