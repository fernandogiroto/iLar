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
            $usertypes = $this->userTypeService->getAll();
            return response()->json( [ 'usertypes' => $usertypes, 'success' => true ] );
        } catch (Exception $e) {
            return response()->json( [ 'success' => false, 'error' => $e->getMessage()] );
        }
    }

    public function store(UserTypeRequest $request) {
        try {
            $usertype = $this->userTypeService->store($request);
            return response()->json([ 'usertype' => $usertype, 'success' => true]);
        } catch (Exception $e) {
            return response()->json( [ 'success' => false, 'error' => $e->getMessage()] );
        }
    }

    public function show(UserType $usertype) {
        return response()->json([ 'usertype' => $usertype]);
    }

    public function update(UserTypeRequest $request, UserType $usertype) {
      
        try {
            $usertype = $this->userTypeService->update($request, $usertype);
            return response()->json([ 'usertype' => $usertype, 'success' => true]);
        } catch (Exception $e) {
            return response()->json( [ 'success' => false, 'error' => $e->getMessage()] );
        }
    }

    public function destroy(UserType $usertype){
        try {
            $this->userTypeService->delete($usertype);
            return response()->json(['success' => true]);
        } catch (Exception $e) {
            return response()->json( ['success' => false, 'error' => $e->getMessage()] );
        }
    }
}
