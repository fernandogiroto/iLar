<?php


namespace App\Services\User;

use App\Interfaces\iService;
use App\User;

class UserService implements iService
{

    function getAll()
    {
        $users = User::all();
        return $users;
    }

    function create() {

    }

    function update() {
        
    }

    function delete() {
        
    }
}
