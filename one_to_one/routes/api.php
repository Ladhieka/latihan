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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::get('/users','UserController@get');

Route::get('/user/{id}','UserController@getById');

Route::post('/user','UserController@post');

Route::put('/user/{id}','UserController@put');

Route::delete('/user/{id}','UserController@delete');



Route::get('/info','Personal_InformationController@get');

Route::get('/info/{id}','Personal_InformationController@getById');

Route::post('/personal-information','Personal_InformationController@store');

Route::put('/info/{id}','Personal_InformationController@put');

Route::delete('/info/{id}','Personal_InformationController@delete');
