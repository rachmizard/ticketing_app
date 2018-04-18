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

//error handler
Route::get('/error-404-not-found-page', 'ErrorHandler@error404')->name('404');

Auth::routes();

//admin
Route::middleware('auth', 'admin')->group(function(){
	Route::prefix('admin')->group(function () {
		Route::get('/home', 'HomeController@index')->name('home.admin');
		Route::resource('/profile', 'ProfileController');
		Route::post('/profile/update', 'ProfileController@update')->name('admin.profile.update');
		Route::resource('customer', 'CustomerController');
		Route::post('/customer/{id}', 'CustomerController@update')->name('admin.customer.update');
		Route::get('/customer/delete/{id}', 'CustomerController@destroy')->name('admin.customer.delete');
		Route::get('/customer/deletechecked/{id}', 'CustomerController@destroychecked')->name('admin.customer.deletechecked');

		Route::resource('reservation', 'ReservationController');
		Route::post('/reservation/{id}', 'ReservationController@update')->name('admin.reservation.update');
		Route::get('/reservation/delete/{id}', 'ReservationController@destroy')->name('admin.reservation.delete');
		Route::get('/reservation/deletechecked/{id}', 'ReservationController@destroychecked')->name('admin.reservation.deletechecked');

		Route::resource('rute', 'RuteController');
		Route::post('/rute/{id}', 'RuteController@update')->name('admin.rute.update');
		Route::get('/rute/delete/{id}', 'RuteController@destroy')->name('admin.rute.delete');
		Route::get('/rute/deletechecked/{id}', 'RuteController@destroychecked')->name('admin.rute.deletechecked');

		Route::resource('transportation', 'TransportationController');
		Route::post('/transportation/{id}', 'TransportationController@update')->name('admin.reservation.update');
		Route::get('/transportation/delete/{id}', 'TransportationController@destroy')->name('admin.reservation.delete');
		Route::get('/transportation/deletechecked/{id}', 'TransportationController@destroychecked')->name('admin.reservation.deletechecked');
		Route::get('/transportasi/deletephoto/{id}', 'TransportationController@deletePhoto')->name('admin.reservation.deletephoto');

		//type transportation
		Route::resource('type-transportation', 'TransportationTypeController');
		Route::post('/type-transportation/{id}', 'TransportationTypeController@update')->name('type.transportation.update');
		Route::get('/type-transportation/delete/{id}', 'TransportationTypeController@destroy')->name('type.transportation.destroy');
	});    
		Route::get('/rute/search', 'RuteController@searchrute')->name('search.rute');
});
Route::middleware('auth', 'web')->group(function(){

	Route::prefix('user')->group(function(){
		Route::get('/home', 'HomeController@index')->name('home');
		Route::get('/profile', 'ProfileController@index')->name('user.profile');
		Route::post('/profile/update', 'ProfileController@update');
		Route::get('validate-customer', 'ValidationCustomerController@index')->name('validation.customer');
		Route::post('validate-customer/validate', 'ValidationCustomerController@store')->name('validate');
		Route::get('pesan-tiket/{id}', 'PesanTiketController@pesanTiket')->name('pesan.tiket');
		Route::post('konfirmasi-tiket', 'PesanTiketController@konfirmasi');
	});


});

