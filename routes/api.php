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

/*Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');*/

Route::group(['middleware' => 'auth', 'prefix' => 'v1'], function () {
  Route::get('bookmark/list', 'BookMark\api\BookMarkController@getListDataTable');
  Route::get('bookmark/{id}/listbookmark', 'BookMark\api\BookMarkController@getListForFolderDataTable');
  Route::resource('bookmark', 'BookMark\api\BookMarkController',[
    'except' => ['index']
  ]);

  Route::get('folder/list', 'Folder\api\FolderController@getListDataTable');
  Route::resource('folder', 'Folder\api\FolderController');
  
});
