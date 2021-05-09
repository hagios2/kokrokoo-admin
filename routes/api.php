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

    Route::get('fetch/pending/pos', 'PaymentController@viewPendingPO');

    Route::get('fetch/approved/pos', 'PaymentController@viewApprovedPO');

    Route::get('fetch/rejected/pos', 'PaymentController@viewRejectPO');

    Route::post('approve/{po}/po', 'PaymentController@approvePO');

    Route::post('reject/{po}/po', 'PaymentController@rejectPO');

    Route::post('unpublish/{company}/media-company', 'AdminAccountController@unPublishCompany');

    Route::post('publish/{company}/media-company', 'AdminAccountController@publishCompany');

    #===================================== Ratecard routes ============================================

    Route::group(['prefix' => 'ratecard'], function () {

        Route::post('/new-title', 'RateCardsController@storeRateCardTitle');

        Route::delete('/detail/{ratecard}/delete', 'RateCardsController@deleteSingleRateCard');

        Route::patch('/{ratecard}/update', 'RateCardsController@updateSingleRateCard');

        Route::get('/{ratecard_title}/preview', 'RateCardsController@getAllRateCardDetails');

        Route::post('{ratecard_title}/add-details', 'RateCardsController@storeRateCardDetails');

        Route::post('/{rateCardTitle}/create-from-existing', 'RateCardsController@storeFromExistingRateCard');

        Route::get('/company/{company}/ratecards', 'RateCardsController@getCompanyRateCards');

        Route::post('{ratecard}/add-durations', 'RateCardsController@addMoreDuration');

        Route::delete('{duration}/delete-duration', 'RateCardsController@deleteDuration');

        Route::get('/{ratecard_title}/details', 'RateCardsController@RateCardDetails');

        Route::delete('/{ratecard_title}/delete', 'RateCardsController@deleteRateCard');

        Route::get('/{company}/get-existing-titles', 'RateCardsController@existingTitles');

        Route::post('/{ratecard_title}/activate', 'RateCardsController@activateRateCard');

        Route::post('/{ratecard_title}/deactivate', 'RateCardsController@deactivateRateCard');

        Route::patch('/{ratecard_title}/update-title', 'RateCardsController@updateRateCardTitle');

        Route::post('/{ratecard_title}/complete/create', 'RateCardsController@completeRateCardCreate');

    });

#===================================== End Ratecard routes ======================================

});

Route::get('get/{mediaType}/media-house', 'ResourceController@mediaHouse');

Route::group(['prefix' => 'subscription'], function () {

    Route::get('all-subscriptions', 'SubscriptionController@index');

    Route::get('{cart}/transaction', 'PaymentController@fetchInvoice');
});







Route::fallback(function(){

    return response()->json(['message' => 'Route not found'], 404);
});