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

// jeng profile
Route::middleware('auth', 'web')->group(function(){

	Route::prefix('user')->group(function(){
		Route::resource('profile', 'ProfileController');
		Route::post('/profile/update', 'ProfileController@update');
	});


});
