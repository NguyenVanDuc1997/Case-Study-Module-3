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
})->name('index');

Route::prefix('rooms')->group(function () {
    Route::get('/', "RoomTypeController@index")->name('roomType.index');
    Route::get('/{id}', "RoomTypeController@getById")->name('roomType.show-detail');
});



Route::prefix('room')->group(function () {
    Route::get('/create', 'RoomController@showFormCreate')->name('room.show-form-create');
    Route::post('/create', 'RoomController@create')->name('room.create-room');
    Route::get('/{id}/edit', 'RoomController@edit')->name('room.edit');
    Route::post('/{id}/edit', 'RoomController@change')->name('room.change');
    Route::post('/{id}/delete','RoomController@delelte')->name('room.delete');
    Route::get('index','RoomController@index')->name('room.index');
});

Route::middleware(['auth'])->group(function () {
    Route::prefix('room-types')->group(function () {
        Route::get('/', "RoomTypeController@indexAdminPage")->name('roomType.index');
        Route::get('/{id}', "RoomTypeController@getById")->name('roomType.show-detail');
    });
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('logout', function () {
    Auth::logout();
    return view('auth.login');
})->name('logout');
