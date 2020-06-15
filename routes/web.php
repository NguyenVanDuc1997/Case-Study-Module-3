<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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


//Route::get('/', function () {
//    return view('layouts.user.home');
//})->name('home.show');
Route::get('/', 'HomePageController@showHomePage')->name('home.show');


//Route::get('/home', 'HomeController@index')->name('home');

Route::get('logout', function () {
    Auth::logout();
    return view('auth.login');
})->name('logout');

Route::prefix('rooms')->group(function () {
    Route::get('/', "RoomTypeController@index")->name('roomTypeUser.index');
    Route::get('/{id}', "RoomTypeController@getById")->name('roomType.show-detail');
});

Route::get('/booking', "ReservationController@showFormBooking")->name('booking.create');
Route::post('/booking', "ReservationController@store")->name('booking.store');

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/home', 'AdminRoomTypeController@index')->name('home');

    Route::prefix('room-types')->group(function () {
        Route::get('/', "AdminRoomTypeController@index")->name('roomType.admin.index');
        Route::get('/{id}/edit', 'AdminRoomTypeController@edit')->name('roomType.admin.edit');
        Route::post('/{id}/store', 'AdminRoomTypeController@update')->name('roomType.admin.update');
        Route::get('/{id}/delete', 'AdminRoomTypeController@destroy')->name('roomType.admin.destroy');
        Route::get('/create', 'AdminRoomTypeController@create')->name('roomType.admin.create');
        Route::post('/create', 'AdminRoomTypeController@store')->name('roomType.admin.store');
    });

    Route::prefix('roomm')->group(function () {
        Route::get('/', 'RoomController@index')->name('room.index');
        Route::get('/create', 'RoomController@showFormCreate')->name('room.show-form-create');
        Route::post('/create', 'RoomController@create')->name('room.create-room');
        Route::get('/{id}/edit', 'RoomController@edit')->name('room.edit');
        Route::post('/{id}/edit', 'RoomController@change')->name('room.change');
        Route::get('/{id}/delete', 'RoomController@delete')->name('room.delete');
    });


    Route::prefix('reservations')->group(function () {
        Route::get('/', 'AdminReservationController@index')->name('reservation.admin.index');
        Route::get('/{id}/verify', 'AdminReservationController@verify')->name('reservation.admin.verify');
        Route::get('/{id}/delete', 'AdminReservationController@destroy')->name('reservation.admin.destroy');
        Route::get('/create', 'AdminReservationController@create')->name('reservation.admin.create');
        //Route::post('/store', 'AdminReservationController@store')->name('reservation.admin.store');
        Route::post('/create', 'AdminReservationController@store')->name('reservation.admin.store');
//        Route::post('/store', function (){
//            return view('layouts.admin.home');
//        })->name('reservation.admin.store');
    });

});


