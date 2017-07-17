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
Route::get('/google7f4bfb36c4507ebb.html', function() {
    return File::get(public_path() . '/google7f4bfb36c4507ebb.html');
});