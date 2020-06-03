<?php

use Illuminate\Support\Facades\Route;

/**
 * Маршруты связанные с аутентификацией/авторизацией и выходом
 */
Route::post('/login', '\App\Http\Controllers\Auth\LoginController@login')->name('login');
Route::post('/logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');
Route::post('/reset_password', '\App\Http\Controllers\Auth\ResetPasswordController@resetPassword')->name('reset_password');


/**
 * Маршруты главных страниц
 */
Route::get('/', 'MainPageController@index')->name('index');
Route::get('/home', 'AccountPageController@home')->name('home');
Route::get('/profile','AccountPageController@profile')->name('profile');

Route::get('/login', function () { // #fixme Настроить класс LoginController или иной для автоматического редиректа на главную страницу
    return redirect()->route('index');
});




/**
 * Маршруты справочников
 */

Route::prefix('help')->group(function () {

    Route::get('/', 'HelpPageController@index')->name('help.index');
    Route::get('/manual', 'HelpPageController@manual')->name('manual');

    Route::get('/employee_list', 'HelpPageController@employeeList')->name('employee_list');

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
Route::get('/tickets/download/{file}', 'Main\Tickets\TicketResourceController@downloadFile')->name('tickets.downloadFile');
