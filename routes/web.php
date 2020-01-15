<?php

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
    return redirect('/admin/dashboard');
})->middleware('auth')->name('welcome');

Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/dashboard', 'HomeController@index')->name('home');
    Route::get('/users', 'UsersController@index')->name('all.users');
    Route::get('/new', 'UsersController@newUsers')->name('new.users');
    Route::get('/media-house', 'UsersController@mediaHouse')->name('media.house');
    Route::get('/organisations', 'UsersController@orgUsers')->name('org.users');
    Route::get('/personal', 'UsersController@personalUsers')->name('personal.users');
    Route::post('/user-account/accept', 'UserAccountController@acceptUser')->name('accept.user');
    Route::post('/user-account/block', 'UserAccountController@blockUser')->name('block.user');
    Route::post('/user-account/unblock', 'UserAccountController@unblockUser')->name('unblock.user');
    Route::get('/subscriptions', 'SubscriptionController@index')->name('all.subs');
    Route::get('/subscriptions/filter', 'FilterSubscriptionController@filter')->name('subs.filter');
    Route::get('/filter', 'FilterSubscriptionController@test')->name('filtered.subs');
    Route::get('/subscriptions/{id}', 'SubscriptionController@show')->name('subs.show');
    Route::get('/subscriptions/view/file/{id}/{m_id}', 'SubscriptionController@download')->name('file.view');
    Route::get('/ratecards', 'RateCardsController@index')->name('rate.cards');
    Route::get('/ratecard/{id}', 'RateCardsController@show')->name('card.show');
    Route::get('/create/admin', 'AdminController@create')->name('create.admin');
    Route::post('/store', 'AdminController@store')->name('store.admin');
    Route::get('/manage/admins', 'AdminController@index')->name('admin.index');
    Route::post('/admin-account/block', 'AdminAccountController@blockUser')->name('block.admin');
    Route::post('/admin-account/unblock', 'AdminAccountController@unblockUser')->name('unblock.admin');
//    Route::get('/audit/trail', 'AuditTrailController@index')->name('audit.trail');
    Route::get('/audits', 'AuditController@index')->name('audits');
    Route::get('/audit','AuditController@index')->name('audit');
    Route::get('/transactions', 'TransactionsController@transactions')->name('transactions');
    Route::get('/admin-account/profile', 'ProfileController@show')->name('profile');
    Route::post('/admin-account/profile/edit', 'AdminProfileController@update')->name('profile.edit');
    Route::post('/admin-account/profile/password-reset', 'AdminProfileController@updatePassword')->name('password.reset');

});

Route::prefix('admin/auth')->group(function () {
    Auth::routes();
});

