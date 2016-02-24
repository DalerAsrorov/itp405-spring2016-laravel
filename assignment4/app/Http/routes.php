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
use App\Services\API\SoundCloud;

Route::group(['prefix' => 'api/v1', 'namespace' => 'API'], function() {
  //POST /api/v1/dvds
  Route::post('dvds', 'DvdController@store');

  //GET api/v1/genres
  Route::get('genres', 'DvdController@index');

  //GET /api/v1/genres/{id}
  Route::get('genres/{id}', 'DvdController@show');

  //GET /api/v1/dvds
  Route::get('dvds', 'DvdController@showAllDvds');

  //GET /api/v1/dvds/{id}
  Route::get('dvds/{id}', 'DvdController@showSingleDvd');

});

Route::get('/soundcloud/{username}', function($username) {
  $soundcloud = new SoundCloud([
    'clientID' => '8b4d6faddcc921664343f7420f4def20'
  ]);

});


Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'web'], function() {
  Route::get('/dvds/search', 'DvdController@search');
  Route::get('/dvds', 'DvdController@results');
  Route::get('genres/{genreId}/dvds', 'DvdController@genreResults');
  Route::get('/dvds/create', 'DvdController@create');
  Route::post('/dvds', 'DvdController@store');
  Route::get('/dvds/{id}', 'DvdController@details');

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
