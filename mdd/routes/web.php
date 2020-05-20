<?php

use Illuminate\Support\Facades\Route;


/**
 * Маргруты главным страниц
 */
Route::get('/', 'MainPageController@index')->name('index');
Route::get('/home', ['middleware' => 'auth', 'uses' => 'Services\Accounts\AccountPageController@home'])->name('home');
Route::get('/profile', ['middleware' => 'auth', 'uses' => 'Services\Accounts\AccountPageController@profile'] )->name('profile');

Route::get('/login', function () { // #fixme Настроить класс LoginController или иной для автоматического редиректа на главную страницу
    return redirect()->route('index');
});

/**
 * Маршруты связанные с подсистемами
 */
Route::resource('/ips', 'Main\IP\IPResourceController')->middleware('auth');
Route::get('/ips/download/{ip}', 'Main\IP\IPResourceController@downloadIP')->name('ips.download');

Route::resource('/files', 'Main\Storage\EmployeeFileResourceController');
Route::get('/files/download/{file}', 'Main\Storage\EmployeeFileResourceController@downloadFile')->name('files.downloadFile');
Route::post('/files_createDirectory', 'Main\Storage\EmployeeFileResourceController@createDirectory')->name('files.createDirectory');
Route::delete('/files_destroyDirectory', 'Main\Storage\EmployeeFileResourceController@destroyDirectory')->name('files.destroyDirectory');


/**
 * Маршруты связанные с аутентификацией/авторизацией и выходом
 */
Route::post('/login', '\App\Http\Controllers\Auth\LoginController@login')->name('login');
Route::post('/logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');

/**
 * Маршруты связанные с панелью администратора
 */
Route::group(['prefix' => 'admin'], function () {
    Route::get('/', 'Services\Accounts\AccountPageController@admin')->name('admin.index');

    Route::resource('accounts', 'Services\Accounts\AccountResourceController');
    Route::get( 'rights', function () { // #fixme Исправить
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
