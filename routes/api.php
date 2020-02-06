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


Route::post('/log', 'AutenticationController@log');
Route::post('/addOrders', 'InputController@addOrders');
Route::post('/addInventory', 'InputController@addInventory');
Route::post('/addProviders', 'InputController@addProviders');
Route::get('/inventoryRelease', 'RequestController@getReleaseTodayInventory');
Route::get('/getReleaseProviders', 'RequestController@getReleaseProviders');
Route::get('/getLessSoldProducts', 'RequestController@getLessSoldProducts');
Route::post('/getOrderStatusById', 'RequestController@getOrderStatusById');
Route::get('/secondDayInventory', 'RequestController@secondDayInventory');
Route::get('/getBestSoldProducts', 'RequestController@getBestSoldProducts');

