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

Route::middleware('auth:api')->get('/auth-user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'auth'], function () {
    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup');

    Route::group(['middleware' => 'auth:api'], function () {
        Route::get('logout', 'AuthController@logout');
        Route::get('user', 'AuthController@user');
    });
});

Route::group(['namespace' => 'Api\V1'], function () {

    Route::resource('events', 'EventController');
    Route::post('events/filter', 'EventController@filter');


    Route::resource('business_deals', 'BusinessDealController');
    Route::post('business_deals/filter', 'BusinessDealController@filter');

    Route::resource('brochures', 'BrochureController');
    Route::post('brochures/filter', 'BrochureController@filter');

    Route::resource('ads', 'AdsController');

    Route::resource('neededs', 'NeededController');
    Route::post('neededs/filter', 'NeededController@filter');

    Route::get('products/compare', 'ProductController@compare');


});


