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
Route::get('/booking/list', 'Booking\BookingController@getReservations')->name('list-booking');
Route::get('/booking/details/{id}', 'Booking\BookingController@details')->name('details-booking');
Route::post('/season-pass/getpass', 'Booking\BookingController@getSeasonPassForGym')->name('get-pass');

//Gyms
Route::get('/gyms', 'Gym\GymController@index')->name('gyms');
Route::get('/gyms/details/{id}', 'Gym\GymController@details')->name('details-gyms');
Route::get('/gyms/create', 'Gym\GymController@create')->name('create-gyms');
Route::post('/gyms/store', 'Gym\GymController@store')->name('store-gyms');
Route::post('/gyms/save', 'Gym\GymController@save')->name('save-gyms');
Route::get('/gyms/edit/{id}', 'Gym\GymController@edit')->name('edit-gyms');

//Session-pass
Route::get('/season-pass', 'SeasonPass\SeasonPassController@getSeasonpass')->name('season-pass');
Route::get('/season-pass/create', 'SeasonPass\SeasonPassController@create')->name('create-season-pass');
Route::post('/season-pass/save', 'SeasonPass\SeasonPassController@store')->name('save-season-pass');
Route::post('/season-pass/details/{id}', 'SeasonPass\SeasonPassController@details')->name('details-season-pass');

//Google
//Route::get('glogin', array('as'=>'glogin','uses'=>'UserController@googleLogin')) ;
Route::get('/google-login', 'GoogleController@googleLogin')->name('google-login');
Route::get('google-user',array('as'=>'user.glist','uses'=>'UserController@listGoogleUser')) ;

