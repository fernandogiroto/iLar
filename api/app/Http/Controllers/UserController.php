<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\StoreUserRequest;
use App\Services\User\UserService;
use App\User;
use Exception;

class UserController extends Controller
{
    public function __construct(
        UserService $userService
    ) {
        $this->userService = $userService;
    }

    public function index() {
        try {
            $users = $this->userService->getAll();
            return response()->json( [ 'success' => true, 'users' => $users ] );
        } catch (Exception $e) {
            return response()->json( [ 'success' => false, 'error' => $e->getMessage()] );
        }
    }

    public function store(StoreUserRequest $request) {
        try {
            $user = $this->userService->store($request);
            return response()->json([ 'user' => $user, 'success' => true]);
        } catch (Exception $e) {
            return response()->json( [ 'success' => false, 'error' => $e->getMessage()] );
        }

    }

    public function show(User $user) {
        return response()->json([ 'user' => $user]);
    }

    public function update(StoreUserRequest $request, User $user) {
        try {
            $user = $this->userService->update($request, $user);
            return response()->json([ 'user' => $user, 'success' => true]);
        } catch (Exception $e) {
            return response()->json( [ 'success' => false, 'error' => $e->getMessage()] );
        }
    }

    public function destroy(User $user){
        try {
            $this->userService->delete($user);
            return response()->json(['success' => true]);
        } catch (Exception $e) {
            return response()->json( ['success' => false, 'error' => $e->getMessage()] );
        }
    }
}
