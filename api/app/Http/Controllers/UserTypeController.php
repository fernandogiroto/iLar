<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserTypeRequest;
use App\Models\UserType;
use App\Services\UserTypeService;
use Illuminate\Http\Request;
use Exception;

class UserTypeController extends Controller
{
    public function __construct( UserTypeService $userTypeService ) 
    {
        $this->userTypeService = $userTypeService;
    }

    public function index() {
        try {
            $user_types = $this->userTypeService->getAll();
            return response()->json( [ 'user_types' => $user_types, 'success' => true ] );
        } catch (Exception $e) {
            return response()->json( [ 'success' => false, 'error' => $e->getMessage()] );
        }
    }

    public function store(UserTypeRequest $request) {
        try {
            $user_type = $this->userTypeService->store($request);
            return response()->json([ 'user_type' => $user_type, 'success' => true]);
        } catch (Exception $e) {
            return response()->json( [ 'success' => false, 'error' => $e->getMessage()] );
        }
    }

    public function show(UserType $user_type) {
        return response()->json([ 'user_type' => $user_type]);
    }

    public function update(UserTypeRequest $request, UserType $user_type) {
        try {
            $user_type = $this->userTypeService->update($request, $user_type);
            return response()->json([ 'user_type' => $user_type, 'success' => true]);
        } catch (Exception $e) {
            return response()->json( [ 'success' => false, 'error' => $e->getMessage()] );
        }
    }

    public function destroy(UserType $user_type){
        try {
            $this->userTypeService->delete($user_type);
            return response()->json(['success' => true]);
        } catch (Exception $e) {
            return response()->json( ['success' => false, 'error' => $e->getMessage()] );
        }
    }
}
