<?php

use App\Http\Requests\ExtraHourRequest;
use App\Models\ExtraHours;

class ExtraHoursService {
    public static function show(ExtraHours $extrahour){
        return $extrahour;
    }

    public static function getAll()
    {
        $extra_hours = ExtraHours::all();
        return $extra_hours;
    }

    public static function store(ExtraHourRequest $request) {
        
        $extra_hours = ExtraHours::create($request->all());
        return $extra_hours;
    }

   public static function update(ExtraHourRequest $request, ExtraHours $extrahour) {
        $extrahour->update($request->all());
        return $extrahour;
    }

   public static function delete(ExtraHours $extrahour) {
        $extrahour->delete();
        return true;
    }

    public static function extraHoursByUserId(int $user_id) {
        $extra_hours = ExtraHours::where('user_id', $user_id)->get();
        return $extra_hours;
    }
}