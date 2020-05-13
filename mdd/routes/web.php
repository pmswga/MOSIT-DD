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

use Illuminate\Support\Facades\Route;
\Illuminate\Support\Facades\Auth::routes();


Route::get('/', 'MainPageController@index')->name('index');
Route::get('/login', ['middleware' => 'guest','uses' => 'MainPageController@login'])->name('login');
Route::get('/about', 'MainPageController@about')->name('about');

Route::get('/home', ['middleware' => 'auth', 'uses' => 'Services\Accounts\AccountPageController@home'])->name('home');
Route::get('/profile', ['middleware' => 'auth', 'uses' => 'Services\Accounts\AccountPageController@profile'] )->name('profile');

Route::resource('/ips', 'Main\IP\IPResourceController');

Route::group(['prefix' => 'admin'], function () {
    Route::get('/', 'Services\Accounts\AccountPageController@admin')->name('admin.index');

    Route::resource('accounts', 'Services\Accounts\AccountResourceController');
});
