<?php

namespace App\Http\Controllers;

use App\Services\User\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(
        UserService $userService
    ) {
       
        $this->userService = $userService;
    }

    public function index() {
        $users = $this->userService->getAll();
        return response()->json($users);
    }
}
