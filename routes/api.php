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
    // return $request->user();
    // Route::post('/mech_login', 'ApiController@mech_login');
});
Route::post('/mech_login', 'ApiController@mech_login');
Route::post('/mech_register', 'ApiController@mech_register');

Route::get('/mechanic_total_reward_point', 'ApiController@mechanic_total_reward_point');
Route::get('/mechanic_quantity_purchased', 'ApiController@mechanic_quantity_purchased');
Route::get('/mechanic_total_redeemed_point', 'ApiController@mechanic_total_redeemed_point')->middleware('auth:api');
Route::get('/mechanic_current_reward_point', 'ApiController@mechanic_current_reward_point');
Route::get('/mechanic_my_progress', 'ApiController@mechanic_my_progress')->middleware('auth:api');
Route::get('/mechanic_get_retailer_id', 'ApiController@mechanic_get_retailer_id');

Route::post('/mechanic_get_products', 'ApiController@mechanic_get_products');

Route::post('/mechanic_create_invoice', 'ApiController@mechanic_create_invoice');
Route::post('/mechanic_view_invoice', 'ApiController@mechanic_view_invoice');
Route::post('/mechanic_purchase_history_period', 'ApiController@mechanic_purchase_history_period');
Route::post('/mechanic_profile', 'ApiController@mechanic_profile');
