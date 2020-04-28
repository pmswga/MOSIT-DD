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

Route::get('/', "MainPageController@index")->name('index');
Route::get('/login', "MainPageController@login")->name('login');
Route::get('/about', "MainPageController@about")->name('about');


Route::get('/profile', 'Services\Accounts\AccountPageController@profile')->name('profile');

Route::group(['prefix' => 'admin'], function () {

    Route::get("/", function () {
       return view("systems.service.admin.index");
    })->name('admin.index');

    Route::group(['prefix' => 'users'], function () {


        Route::get('/addAccount', function () {
            return view("systems.service.admin.register", [
                "employees" => \App\Models\Employee::all(),
                "accountTypes" => \App\Models\Service\Accounts\AccountType::all()
            ]);
        })->name('admin.users.add');


    });

});

Route::group(['prefix' => 'methodist', 'middleware' => ['auth']], function () {

    Route::get('/', 'Services\Accounts\AccountPageController@methodistIndex')->name('methodist.index');

});

Route::group(['prefix' => 'teacher', 'middleware' => ['auth']], function () {

    Route::get('', 'Services\Accounts\AccountPageController@teacherIndex')->name('teacher.index');

});

Route::group(['prefix' => 'deputy-edu-work'], function () {

    Route::get('/', function () {
        return view('accounts.deputy_edu_work');
    })->name('deputy-edu-work.index');

});

Route::group(['prefix' => 'deputy-science-work'], function () {

    Route::get('/', function () {
        return view('accounts.deputy_science_work');
    })->name('deputy-science-work.index');

});

Route::group(['prefix' => 'deputy-edu-metho-work'], function () {

    Route::get('/', function () {
        return view('accounts.deputy_edu_metho_work');
    })->name('deputy-edu-metho-work.index');

});

Route::group(['prefix' => 'deputy-mto'], function () {

    Route::get('/', function () {
        return view('accounts.deputy_mto');
    })->name('deputy-mto.index');

});

Route::group(['prefix' => 'deputy-students'], function () {

    Route::get('/', function () {
        return view('accounts.deputy_students');
    })->name('deputy-students.index');

});

Route::group(['prefix' => 'science-secretary'], function () {

    Route::get('/', function () {
        return view('accounts.science_secretary');
    })->name('science-secretary.index');

});

Route::group(['prefix' => 'head-faculty'], function () {

    Route::get('/', function () {
        return view('accounts.head_faculty');
    })->name('head-faculty.index');

});



