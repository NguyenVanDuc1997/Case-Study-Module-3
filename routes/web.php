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
    Route::get('/{name}', "RoomTypeController@getById")->name('roomType.show-detail');
});


//Auth::routes();
//Route::get('/home', 'HomeController@index')->name('home');



Route::prefix('room')->group(function () {
    Route::get('/create', 'RoomController@showFormCreate')->name('room.show-form-create');
    Route::post('/create', 'RoomController@create')->name('room.create-room');
});

Route::middleware(['auth'])->group(function (){
    Route::prefix('room-types')->group(function (){
        Route::get('',function (){
            return view('layouts.admin.home');
        });
    });
});




Route::get('logout',function (){
    Auth::logout();
    return view('auth.login');
})->name('logout');
