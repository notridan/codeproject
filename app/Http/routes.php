<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::post('oauth/access_token', function() {
   return Response::json(Authorizer::issueAccessToken());
});

Route::group(['middleware' => 'oauth'], function () {

    Route::resource('client', 'ClientController', ['except' => ['create', 'edit']]);

    Route::resource('project', 'ProjectController', ['except' => ['create', 'edit']]);

    Route::group(['prefix' => 'project'], function () {

        Route::get('{id}/note', 'projectNoteController@index');
        Route::post('{id}/note', 'projectNoteController@store');
        Route::get('{id}/note/{noteId}', 'projectNoteController@show');
        Route::put('{id}/note/{noteId}', 'projectNoteController@update');
        Route::delete('{id}/note/{noteId}', 'projectNoteController@destroy');

    });


});

//Route::get('client', ['middleware' => 'oauth', 'uses' => 'ClientController@index']);
//Route::post('client', 'ClientController@store');
//Route::put('client/{id}', 'ClientController@update');
//Route::get('client/{id}', 'ClientController@show');
//Route::delete('client/{id}', 'ClientController@destroy');
//
//Route::get('project/{id}/note', 'projectNoteController@index');
//Route::post('project/{id}/note', 'projectNoteController@store');
//Route::get('project/{id}/note/{noteId}', 'projectNoteController@show');
//Route::put('project/{id}/note/{noteId}', 'projectNoteController@update');
//Route::delete('project/{id}/note/{noteId}', 'projectNoteController@destroy');
//
//Route::get('project', 'projectController@index');
//Route::post('project', 'projectController@store');
//Route::put('project/{id}', 'projectController@update');
//Route::get('project/{id}', 'projectController@show');
//Route::delete('project/{id}', 'projectController@destroy');

