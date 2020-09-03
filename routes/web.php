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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function() {
	Route::get('/users', 'UsersController@getUsers');
	Route::delete('/users/{user}/delete', 'UsersController@deleteUser');

	Route::resource('newusers', 'Admin\NewusersController');

	// Route::get('/users/create', 'UsersController@createUsers');
	// Route::post('/users/create', 'UsersController@storeUsers');
});


