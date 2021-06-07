<?php

use App\Mail\SayHello;
use App\Models\Doctor;
use App\Models\Clinic;
use Illuminate\Support\Facades\Route;
use App\Models\Speciality;
use App\User;
use App\Models\Action;
use Illuminate\Support\Facades\Mail;
use App\Models\ActionRegistration;
use App\Models\UserType;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
   $user = User::findOrFail(1);

   $user_type = UserType::find(3);

   //$user->user_type()->save($user_type);

//dd($user->load('user_type'));

    //$clinic->specialities()->save($speciality);

    return response()->json($user);
    //return view('welcome');
});

Route::get('/test', function () {
    
    $accao_registada = ActionRegistration::find(1);
    dd($accao_registada); 

});



Route::get('/user/create', function() {
    //$name = Str::random(5);

    $faker = Faker\Factory::create();
    $user['name'] = $faker->name;
    $user['email'] = $faker->unique()->email;
    $user['password'] = bcrypt('123');
    $user['birthplace'] = 'Lisboa';
    $user['birthdate'] = '1988-12-18';
    $user = User::create($user);
    $user->user_type()->attach(1);
    return $user->load('user_type');
    
    
});