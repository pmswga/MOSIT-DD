<?php

use Illuminate\Support\Facades\Route;

\Illuminate\Support\Facades\Auth::routes();


Route::get('/', 'MainPageController@index')->name('index');
Route::get('/login', ['middleware' => 'guest','uses' => 'MainPageController@login'])->name('login');
Route::get('/about', 'MainPageController@about')->name('about');

Route::get('/home', ['middleware' => 'auth', 'uses' => 'Services\Accounts\AccountPageController@home'])->name('home');
Route::get('/profile', ['middleware' => 'auth', 'uses' => 'Services\Accounts\AccountPageController@profile'] )->name('profile');

Route::resource('/ips', 'Main\IP\IPResourceController');
Route::get('/ips/download/{ip}', 'Main\IP\IPResourceController@downloadIP')->name('ips.download');

Route::group(['prefix' => 'admin'], function () {
    Route::get('/', 'Services\Accounts\AccountPageController@admin')->name('admin.index');

    Route::resource('accounts', 'Services\Accounts\AccountResourceController');
    Route::get( 'rights', function () {
        $rawRights = \Illuminate\Support\Facades\DB::table('accounts as ac')
            ->select('ac.idAccount', 'ac.email', 'lss.idSubSystem', 'lss.caption', 'ar.isAccess', 'ar.isViewAny', 'ar.isView', 'ar.isCreate', 'ar.isUpdate', 'ar.isDelete')
            ->join('accounts_rights as ar', 'ar.idAccount', '=', 'ac.idAccount')
            ->join('list_sub_system as lss', 'lss.idSubSystem', '=', 'ar.idSubSystem')
            ->get();

        $rights = [];

        foreach ($rawRights as $rawRight) {
            $rights[$rawRight->email][] = $rawRight;
        }

        return view('systems.service.accounts.account_rights', [
            'rights' => $rights
        ]);
    })->name('accounts.rights');
});
