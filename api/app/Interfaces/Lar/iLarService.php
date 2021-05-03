<?php

namespace App\Interfaces\Lar;

use App\Http\Requests\Lar\StoreLarRequest;

interface iLarService
{
    function getAll();
    function show(int $id);
    function store(StoreLarRequest $request);
    function update(StoreLarRequest $request,  int $lar_id);
    function delete(int $lar_id);

}
