<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('themplate.main');
})->name('main');

Route::post('login', 'Auth\web\AuthController@userAuth')->name('login');

Route::group(['middleware' => 'auth'], function () {
  Route::get('manager', function(){
    return view('welcome');
  })->name('manager');
});

Route::resource('user', 'User\web\UserCotroller');
