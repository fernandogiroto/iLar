<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lar;
use App\Models\Doctor;
use App\Services\Lar\LarService;
use App\Http\Requests\Lar\StoreLarRequest;
use Exception;

class LarController extends Controller
{

    public function __construct(
        LarService $larService
    ) {
     
        $this->larService = $larService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lares = $this->larService->getAll();
        return response()->json($lares);
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLarRequest $request)
    {
        
        try {
            $lar = $this->larService->store($request);
            return response()->json([ 'lar' => $lar, 'success' => true]);
        } catch (Exception $e) {
            return response()->json(
                [ 'success' => false, 'error' => $e->getMessage()]
            );
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  Lar  $lar
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $lar = Lar::findOrFail($id);
        return response()->json( $lar );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Requests\Lar\StoreLarRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreLarRequest $request, int $lar_id)
    {
    
        try {
            $lar = $this->larService->update($request, $lar_id);
            return response()->json([ 'lar' => $lar, 'success' => true]);
        } catch (Exception $e) {
            return response()->json( [ 'success' => false, 'error' => $e->getMessage()] );
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $lar_id
     * @return \Illuminate\Http\Response
     */
    public function destroy($lar_id)
    {
        try {
            $this->larService->delete($lar_id);
            return response()->json(['success' => true]);
        } catch (Exception $e) {
            return response()->json( [ 'success' => false, 'error' => $e->getMessage()] );
        }
    }
}
