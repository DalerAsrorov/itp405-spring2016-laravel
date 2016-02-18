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
Route::get('/', function () {
    return view('welcome');
});


Route::group(['middleware' => 'web'], function() {
  Route::get('/dvds/search', 'DvdController@search');
  Route::get('/dvds', 'DvdController@results');
  ///genres/{genre id}/dvds
  Route::get('genres/{genreId}/dvds', 'DvdController@genreResults');
  Route::get('/dvds/create', 'DvdController@create');
  Route::post('/dvds', 'DvdController@store');
  Route::get('/dvds/{id}', 'DvdController@details');
  //Route::post('/dvds', 'DvdController@storeReview');

});

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
