<?php

namespace App\Interfaces;

use App\Http\Requests\Lar\StoreLarRequest;

interface iService
{
    function getAll();
    function show(int $id);
    function store(StoreLarRequest $request);
    function update(StoreLarRequest $request, int $id);
    function delete(int $id);

}
