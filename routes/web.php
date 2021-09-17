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
    return view('auth.login');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix'=>'booking','as'=>'booking.'], function(){

    //booking form
    Route::get('new', function () {
        return view('booking.create');
    })->name('new');

    //
    Route::post('create', 'BookingController@store')->name('store');

    // Get User Bookings
    Route::get('/{user}/bookings', 'BookingController@list')->name('list');


});


