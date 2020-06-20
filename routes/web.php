<?php

use Illuminate\Support\Facades\Route;

/**
 * ===========================================================
 * Маршруты связанные с аутентификацией/авторизацией и выходом
 * ===========================================================
 */
Route::post('/login', '\App\Http\Controllers\Auth\LoginController@login')->name('login');
Route::get('/login', '\App\Http\Controllers\Auth\LoginController@redirectToIndex');
Route::post('/logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');
Route::post('/reset_password', '\App\Http\Controllers\Auth\ResetPasswordController@resetPassword')->name('reset_password');


/**
 * ========================
 * Маршруты главных страниц
 * ========================
 */
Route::get('/', 'MainPageController@index')->name('index');
Route::get('/home', 'AccountPageController@home')->name('home');
Route::get('/profile','AccountPageController@profile')->name('profile');


/**
 * =====================
 * Маршруты справочников
 * =====================
 */

Route::prefix('help')->group(function () {
    Route::get('/', 'HelpPageController@index')->name('help.index');
    Route::get('/manual', 'HelpPageController@manual')->name('manual');

});

/**
 * =================================
 * Маршруты связанные с подсистемами
 * =================================
 */


/**
 * Подсистема индивидуальных планов
 */

Route::resource('/ips', 'Main\IP\IPResourceController');
Route::get('/ips/download/{ip}', 'Main\IP\IPResourceController@downloadIP')->name('ips.download');
Route::get('/ips/works/orgWorks', 'Main\IP\WorkResourceController@ajaxGetListOrgWorks');


/**
 * Подсистема хранения материалов
 */

Route::resource('/files', 'Main\Storage\EmployeeFileResourceController');
Route::get('/files/download/{file}', 'Main\Storage\EmployeeFileResourceController@downloadFile')->name('files.downloadFile');
Route::post('/files_createDirectory', 'Main\Storage\EmployeeFileResourceController@createDirectory')->name('files.createDirectory');
Route::delete('/files_destroyDirectory', 'Main\Storage\EmployeeFileResourceController@destroyDirectory')->name('files.destroyDirectory');
Route::get('/trash', 'Main\Storage\EmployeeFileResourceController@trashIndex')->name('files.trash');
Route::post('/files/trash/move/{file}', 'Main\Storage\EmployeeFileResourceController@moveToTrash')->name('files.moveToTrash');
Route::post('/files/trash/restore/{file}', 'Main\Storage\EmployeeFileResourceController@restoreFromTrash')->name('files.restoreFromTrash');
Route::post('/files/trash/restoreAll', 'Main\Storage\EmployeeFileResourceController@restoreAllFromTrash')->name('files.restoreAllFromTrash');

/**
 * Подсистема поручений
 */

Route::resource('/tickets', 'Main\Tickets\TicketResourceController');
Route::get('/tickets_inbox', 'Main\Tickets\TicketResourceController@inbox')->name('tickets.inbox');
Route::get('/tickets_expired', 'Main\Tickets\TicketResourceController@expired')->name('tickets.expired');
Route::get('/tickets/download/{file}', 'Main\Tickets\TicketResourceController@downloadFile')->name('tickets.downloadFile');
Route::match(['patch', 'put'], '/ticket/attachFile/{ticket}', 'Main\Tickets\TicketResourceController@attachFile')->name('tickets.attachFile');
Route::match(['patch', 'put'], '/ticket/comment/{ticket}', 'Main\Tickets\TicketResourceController@addComment')->name('tickets.addComment');

