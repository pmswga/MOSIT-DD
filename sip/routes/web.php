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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', function () {
    return view('index');
});

Route::get('/teachers', function () {
	return view('teachers');
});

Route::get('/subjects', function () {
	return view('subjects');
});

Route::get('/profile', function () {
	return view('user.profile');
});
