<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


 Route::group([

    'middleware' => ['api', 'cors'],
    'prefix' => 'auth'

], function ($router) {
    
    Route::post('login', 'AuthController@login')->name('login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');

});


//Route::group(['middleware' => ['auth.jwt', 'cors']], function ($router) {
Route::group(['middleware' => ['cors']], function ($router) {    
    Route::apiResource('lares','LarController');
    Route::apiResource('users','UserController');
    Route::apiResource('patients','PatientController');
    Route::apiResource('usertypes','UserTypeController');
    Route::apiResource('actions','ActionController');
    Route::apiResource('registrations','ActionRegistrationController');
    Route::apiResource('extrahours','ExtraHoursController');
    Route::get('extrahours/{user}/{month?}','ExtraHoursController@getExtraHourByUser');
});