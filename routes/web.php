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

Route::get('/', 'HotelController@index');

Route::post('/reservation', 'HotelController@reservation')->name('sendReservationRequest');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/reservation_content', 'HomeController@reservation_content')->name('reservationContent');
Route::post('/finish_reservation', 'HotelController@finish_reservation')->name('finish_reservation');

