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

    Route::post('/logout', 'LogoutController@logout');

    Route::get('fetch-new-registered-media-accounts', 'AdminAccountController@fetchNewMediaAccounts');

    Route::get('fetch-new-registered-client-accounts', 'AdminAccountController@fetchNewClientAccounts');

    Route::post('block/{client}/client-account', 'AdminAccountController@blockClientAccount');

    Route::post('reject/{client}/client-account', 'AdminAccountController@rejectClient');

    Route::post('block/{user}/media-account', 'AdminAccountController@blockMediaAccount');

    Route::post('unblock/{client}/client-account', 'AdminAccountController@unBlockClientAccount');

    Route::post('reject/{user}/media-account', 'AdminAccountController@rejectMedia');

    Route::post('unblock/{user}/media-account', 'AdminAccountController@unBlockMediaAccount');

    Route::get('get-activated-client', 'AdminController@activatedClient');

    Route::get('get-activated-media-admin', 'AdminController@activatedMedia');

    Route::post('activate-client/{client}/account', 'AdminAccountController@activateClient');

    Route::post('activate-user/{user}/account', 'AdminAccountController@activateMedia');

    Route::get('client/{client}/view', 'AdminController@viewClient');

    Route::get('user/{user}/view', 'AdminController@viewMedia');

    Route::post('set/registration/amount', 'PaymentController@setAmount');

    Route::get('get/company/{company}/volume-discount', 'PaymentController@volumeDiscount');

    Route::post('set/company/volume-discount', 'PaymentController@createVolumeDiscount');

    Route::patch('edit/company/{volumeDiscount}/volume-discount', 'PaymentController@updateVolumeDiscount');

    Route::delete('delete/company/{volumeDiscount}/volume-discount', 'PaymentController@deleteVolumeDiscount');

});

Route::get('get/{mediaType}/media-house', 'ResourceController@mediaHouse');

Route::group(['prefix' => 'subscription'], function () {

    Route::get('all-subscriptions', 'SubscriptionController@index');
});





Route::fallback(function(){

    return response()->json(['message' => 'Route not found'], 404);
});