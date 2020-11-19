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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/home', 'HomeController@Home');

Route::get('/register', 'AuthController@Register');

Route::post('/welcome', 'AuthController@Welcome_post');



Route::get('/', function () {
    return view('items.index');
});

Route::get('/master', function () {
    return view ('adminlte.master');
});

Route::get('/data-tables', function () {
    return view ('items.data-tables');
});


Route::resource('pertanyaan','PertanyaansController');