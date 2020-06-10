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
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
<<<<<<< HEAD




Route::prefix('room')->group( function () {
    Route::get('/create-room','RoomController@createForm')->name('room.create-form');
    Route::post('/createRoom','RoomController@createRoom')->name('room.create-room');

=======
Route::prefix('room')->group(function () {
    Route::get('/create', 'RoomController@showFormCreate')->name('room.show-form-create');
    Route::post('/create', 'RoomController@create')->name('room.create-room');
>>>>>>> 1b4e7083b96fc06a5c42e817b3e85d1dd904d809
});

