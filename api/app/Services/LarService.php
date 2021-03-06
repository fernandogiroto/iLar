<?php


namespace App\Services;

use App\Http\Requests\StoreLarRequest;
use App\Interfaces\iLarService;
use App\Models\Lar;

class LarService implements iLarService
{
    function show(int $id){

    }

    function getAll()
    {
        $lares = Lar::all();
        return $lares;
    }

    function store(StoreLarRequest $request) {
        
        $lar = Lar::create($request->all());
        return $lar;
    }

    function update(StoreLarRequest $request, int $lar_id) {
        $lar = Lar::find($lar_id);
        $lar->update($request->all());
        return $lar;
    }

    function delete(int $lar_id) {
        $lar = Lar::find($lar_id);
        $lar->delete();
        return $lar;
    }
}
