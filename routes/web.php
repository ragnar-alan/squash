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

Route::get('/', "MainController@index");

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('auth/google', 'GoogleController@redirectToProvider')->name('google.login');
Route::get('auth/google/callback', 'GoogleController@handleProviderCallback');

//Booking
Route::get('/booking/create', 'Booking\BookingController@book')->name('create-booking');
Route::post('/booking/save', 'Booking\BookingController@store')->name('store-booking');
Route::get('/booking/list', 'Booking\BookingController@list')->name('list-booking');

//Gyms
Route::get('/gyms', 'Gym\GymController@index')->name('gyms');
Route::get('/gyms/create', 'Gym\GymController@create')->name('create-gyms');
Route::post('/gyms/save', 'Gym\GymController@save')->name('save-gyms');

//Session-pass
Route::get('/session-pass', 'SessionPass\SessionPassController@list')->name('session-pass');
Route::get('/session-pass/create', 'SessionPass\SessionPassController@create')->name('create-session-pass');
Route::post('/session-pass/save', 'SessionPass\SessionPassController@store')->name('save-session-pass');
