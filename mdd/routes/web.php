<?php

use Illuminate\Support\Facades\Route;


/**
 * Маргруты главным страниц
 */
Route::get('/', 'MainPageController@index')->name('index');
Route::get('/manual', 'MainPageController@manual')->name('manual');
Route::get('/home', 'Service\Accounts\AccountPageController@home')->name('home');
Route::get('/profile','Service\Accounts\AccountPageController@profile')->name('profile');

Route::get('/login', function () { // #fixme Настроить класс LoginController или иной для автоматического редиректа на главную страницу
    return redirect()->route('index');
});

/**
 * Маршруты связанные с подсистемами
 */
Route::resource('/ips', 'Main\IP\IPResourceController');
Route::get('/ips/download/{ip}', 'Main\IP\IPResourceController@downloadIP')->name('ips.download');

Route::resource('/files', 'Main\Storage\EmployeeFileResourceController');
Route::get('/files/download/{file}', 'Main\Storage\EmployeeFileResourceController@downloadFile')->name('files.downloadFile');
Route::post('/files_createDirectory', 'Main\Storage\EmployeeFileResourceController@createDirectory')->name('files.createDirectory');
Route::delete('/files_destroyDirectory', 'Main\Storage\EmployeeFileResourceController@destroyDirectory')->name('files.destroyDirectory');

Route::resource('/tickets', 'Main\Tickets\TicketResourceController');
Route::get('/tickets_inbox', 'Main\Tickets\TicketResourceController@inbox')->name('tickets.inbox');
Route::get('/tickets_expired', 'Main\Tickets\TicketResourceController@expired')->name('tickets.expired');

/**
 * Маршруты связанные с аутентификацией/авторизацией и выходом
 */
Route::post('/login', '\App\Http\Controllers\Auth\LoginController@login')->name('login');
Route::post('/logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');

/**
 * Маршруты связанные с панелью администратора
 */
Route::group(['prefix' => 'admin'], function () {
    Route::get('/', 'Service\Accounts\AccountPageController@admin')->name('admin.index');

    Route::resource('employees', 'Main\Employees\EmployeeResourceController');

    Route::resource('accounts', 'Service\Accounts\AccountResourceController');
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
