<?php

use Illuminate\Http\Request;


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::apiResource('grandfather', 'GrandfatherController');

Route::apiResource('child', 'ChildController');

Route::apiResource('grandchild', 'GrandchildController');

Route::apiResource('toy', 'ToyController');




Route::get('/grandfather/grandchild/{id}', 'GrandfatherController@grandfather_grandchild');