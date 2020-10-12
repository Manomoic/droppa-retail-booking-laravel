<?php

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

Route::get('/', 'BookingsController@index')->name('home');
Route::get('/create_bookings', 'BookingsController@create')->name('create');
Route::post('/store_bookings', 'BookingsController@store')->name('store');

Route::get('/edit/{id}', 'BookingsController@edit')->name('edit');
Route::put('/update/{id}', 'BookingsController@update')->name('update');
Route::delete('/delete/{id}', 'BookingsController@delete')->name('delete');
