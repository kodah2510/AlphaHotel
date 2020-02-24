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
Route::get('/view_find_room', 'HotelController@view_find_room')->name('view_find_room');
Route::get('/find_room', 'HotelController@find_room')->name('find_room');
Route::get('/view_book_room', 'HotelController@view_book_room')->name('view_book_room');



Route::post('/reservation_content', 'HomeController@reservation_content')->name('reservationContent');
Route::post('/finish_reservation', 'HotelController@finish_reservation')->name('finish_reservation');
// Route::post('/find_room', 'HotelController@find_room')->name('find_room');
Route::post('/reservation_payment', 'HotelController@reservation_payment')->name('reservation_payment');

Route::get('/admin', function() {
    return "i'm at the admin page";
})->middleware('auth');

Route::get('/admin/profile', function() {

})->middleware(CheckAge::class);


Route::get('/json_res', function() {
    return [1, 2, 3];
});

Route::get('/full_res', function() {
    return response('Hello world', 200)
        ->header('Content-Type', 'text/plain');
});

Route::middleware('cache.headers:public;max_age=2628000;etag')->group(function() {
    Route::get('privacy', function() {

    });

    Route::get('terms', function() {

    });
});

Route::get('/attach_cookie', function() {
    return response('attached cookie', 200)
        ->header('Content-Type', 'text/plain')
        ->cookie('my_cookie', 1234, 1);
});

// redirect to external domains

Route::get('/away', function() {
    return redirect()->away('https://www.google.com');
});

Route::get('/test_view', function() {
    return view('test', ['name' => 'Khoa Tong']);
});