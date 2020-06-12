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

Route::get('/', function () {
    return view('layouts.user.home');
})->name('home.show');


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('logout', function () {
    Auth::logout();
    return view('auth.login');
})->name('logout');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');



Route::prefix('rooms')->group(function () {
    Route::get('/', "RoomTypeController@index")->name('roomTypeUser.index');
    Route::get('/{id}', "RoomTypeController@getById")->name('roomType.show-detail');
});


<<<<<<< HEAD
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
=======
Route::get('/booking', "ReservationController@showFormBooking")->name('booking.create');
>>>>>>> b6ee117cedea873bc0727f861ea8d763ccaf829e


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('room')->group(function () {
    Route::get('/create', 'RoomController@showFormCreate')->name('room.show-form-create');
    Route::post('/create', 'RoomController@create')->name('room.create-room');
    Route::get('/{id}/edit', 'RoomController@edit')->name('room.edit');
    Route::post('/{id}/edit', 'RoomController@change')->name('room.change');
    Route::get('/{id}/delete','RoomController@delete')->name('room.delete');
    Route::get('index','RoomController@index')->name('room.index');
});

Route::middleware(['auth'])->group(function () {
    Route::prefix('room-types')->group(function () {
        Route::get('/', "AdminRoomTypeController@index")->name('roomType.admin.index');
        Route::get('/{id}/edit','AdminRoomTypeController@edit')->name('roomType.admin.edit');
        Route::post('/{id}/store','AdminRoomTypeController@store')->name('roomType.admin.store');
        Route::get('/{id}/delete','AdminRoomTypeController@destroy')->name('roomType.admin.destroy');
    });
});
<<<<<<< HEAD
Route::get('logout', function () {
    Auth::logout();
    return view('auth.login');
})->name('logout');

Route::prefix('users')->group(function (){
    Route::get('/','UserController@getAll')->name('users.list');
    Route::get('/{id}/delete','UserController@delete')->name('users.delete');
    Route::get('/{id}/change-password','UserController@showFormChangePassword')->name('users.showFormChangePassword');
    Route::post('/{id}/change-password','UserController@changePassword')->name('users.changePassword');
    Route::get('{id}/edit', 'UserController@update')->name('users.update');
    Route::post('{id}/edit', 'UserController@edit')->name('users.edit');
    Route::get('/create', 'UserController@create')->name('users.create');
    Route::post('/create', 'UserController@store')->name('users.store');
    Route::get('/search', 'UserController@search')->name('users.search');
});
=======


>>>>>>> b6ee117cedea873bc0727f861ea8d763ccaf829e
