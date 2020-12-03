<?php

use Illuminate\Http\Request;



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/people', 'PersonController@index');

Route::get('/person/{person}', 'PersonController@show');

Route::post('/person', 'PersonController@store');

Route::put('/person/{person}', 'PersonController@update');

Route::delete('/person/{person}', 'PersonController@destroy');


Route::get('/relation/{param1}','PersonController@relation');

Route::get('/relation/{param1}/{param2}','PersonController@find');


Route::post('/register','RegisterController@register');

Route::post('/login','LoginCOntroller@login');

Route::get('/user','UserController@user');
