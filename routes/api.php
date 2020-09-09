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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('events', 'Api\V1\EventController');
Route::post('events/filter', 'Api\V1\EventController@filter');


Route::resource('business_deals', 'Api\V1\BusinessDealController');
Route::post('business_deals/filter', 'Api\V1\BusinessDealController@filter');

Route::resource('brochures', 'Api\V1\BrochureController');
Route::post('brochures/filter', 'Api\V1\BrochureController@filter');