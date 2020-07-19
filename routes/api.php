<?php

use Illuminate\Http\Request;

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

Route::group(['prefix' => 'admin'], function () {

    Route::get('/', 'AdminProfileController@getAuthAdmin');

    Route::patch('/update-profile', 'AdminProfileController@update');

    Route::post('/change-password', 'AdminProfileController@updatePassword');
    
});


Route::fallback(function(){

    return response()->json(['message' => 'Route not found'], 404);
});