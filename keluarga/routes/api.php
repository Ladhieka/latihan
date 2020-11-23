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



Route::get('/kakeks', 'KakekController@index');

Route::get('/kakek/{id}', 'KakekController@show');

Route::post('/kakek', 'KakekController@store');

Route::put('/kakek/{id}', 'KakekController@update');

Route::delete('/kakek/{id}', 'KakekController@destroy');


Route::get('/anaks', 'AnakController@index');

Route::get('/anak/{id}', 'AnakController@show');

Route::post('/anak', 'AnakController@store');

Route::put('/anak/{id}', 'AnakController@update');

Route::delete('/anak/{id}', 'AnakController@destroy');


Route::get('/cucus', 'CucuController@get');

Route::get('/cucu/{id}', 'CucuController@getById');

Route::post('/cucu', 'CucuController@post');

Route::put('/cucu/{id}', 'CucuController@put');

Route::delete('/cucu/{id}', 'CucuController@delete');

