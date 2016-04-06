<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/', ['as' => 'dashboard', 'uses' =>'HomeController@index']);
    Route::get('upload', ['as' => 'upload', 'uses' =>'UploadController@index']);

	Route::get('settings', ['as' => 'profile', 'uses' =>'SettingController@index']);
	Route::get('history', ['as' => 'history', 'uses' =>'HistoryController@index']);
	Route::get('users/{id}', ['as' => 'users','uses' =>'UserController@details']);
    Route::get('users', ['as' => 'users', 'uses' =>'UserController@index']);


	Route::get('fileentry/get/{filename}', ['as' => 'getfile', 'uses' => 'FileEntryController@get']);
	Route::post('fileentry/add',['as' => 'addfile', 'uses' => 'FileEntryController@add']);
 

});




