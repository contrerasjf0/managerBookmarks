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
  Route::post('logout', 'Auth\web\AuthController@logOut')->name('logout');

  Route::get('manager', function(){
    return view('themplate.manager');
  })->name('manager');

  Route::get('bookmark/list', 'BookMark\api\BookMarkController@getListDataTable');
  Route::get('bookmark/{id}/listbookmark', 'BookMark\api\BookMarkController@getListForFolderDataTable');
  Route::resource('bookmark', 'BookMark\api\BookMarkController',[
    'except' => ['index']
  ]);

  Route::get('folder/list', 'Folder\api\FolderController@getListDataTable');
  Route::resource('folder', 'Folder\api\FolderController');
  
});

Route::resource('user', 'User\web\UserCotroller');
