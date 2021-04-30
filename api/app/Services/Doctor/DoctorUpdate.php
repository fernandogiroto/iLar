<?php

namespace App\Services\Doctor;

use App\Http\Requests\Doctor\UpdateDoctorRequest;
use App\Interfaces\Doctor\iDoctorUpdate;
use App\Models\Doctor;
use App\User;
use Exception;

//use App\Interfaces\Doctors\iDoctorUpdate

class DoctorUpdate implements iDoctorUpdate {
    public function execute(UpdateDoctorRequest $request, Doctor $doctor) {

        if(!$doctor)
            throw new Exception('Doctor not found');

        // change the user of doctor
        if (array_key_exists('user_id', $request->all())) {
            $user = User::findOrFail($request['user_id']);

            if ( $user && ($user->id != $doctor->user_id) ) {
                $doctor->update(['user' => $user]);
            }

            unset($request['user_id']);
        }

        if ( count( $request->all() ) > 0 ) {
            $doctor->user->update($request->all());
        }

        return $doctor->load('user');
    }
}
