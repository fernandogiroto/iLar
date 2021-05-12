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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    //dd($request);
    return $request->user();
});

Route::apiResource('users','UserController');
Route::apiResource('usertypes','UserTypeController');
Route::apiResource('lares','LarController');
Route::apiResource('actions','ActionController');
Route::apiResource('registrations','ActionRegistrationController');
Route::apiResource('extrahours','ExtraHoursController');
Route::get('extrahours/{user}/{month?}','ExtraHoursController@getExtraHourByUser');

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {
    
    Route::post('login', 'AuthController@login')->name('login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');

});