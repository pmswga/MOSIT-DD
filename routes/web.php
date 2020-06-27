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
Route::get('/ips/works/metWorks', 'Main\IP\WorkResourceController@ajaxGetListMetWorks');
Route::get('/ips/works/sciWorks', 'Main\IP\WorkResourceController@ajaxGetListSciWorks');
Route::get('/ips/works/orgWorks', 'Main\IP\WorkResourceController@ajaxGetListOrgWorks');


/**
 * Подсистема хранения материалов
 */

Route::get('/storage/download/{storage}', 'Main\Storage\EmployeeFileResourceController@downloadFile')->name('storage.downloadFile');
Route::post('/storage/createDirectory', 'Main\Storage\EmployeeFileResourceController@createDirectory')->name('storage.createDirectory');
Route::delete('/storage/destroyDirectory', 'Main\Storage\EmployeeFileResourceController@destroyDirectory')->name('storage.destroyDirectory');
Route::get('/storage/trash', 'Main\Storage\EmployeeFileResourceController@trashIndex')->name('storage.trash');
Route::post('/storage/trash/move/{storage}', 'Main\Storage\EmployeeFileResourceController@moveToTrash')->name('storage.moveToTrash');
Route::post('/storage/trash/restore/{storage}', 'Main\Storage\EmployeeFileResourceController@restoreFromTrash')->name('storage.restoreFromTrash');
Route::post('/storage/trash/restoreAll', 'Main\Storage\EmployeeFileResourceController@restoreAllFromTrash')->name('storage.restoreAllFromTrash');

Route::resource('/storage', 'Main\Storage\EmployeeFileResourceController');

/**
 * Подсистема поручений
 */

Route::get('/tickets/inbox', 'Main\Tickets\TicketResourceController@inbox')->name('tickets.inbox');
Route::get('/tickets/expired', 'Main\Tickets\TicketResourceController@expired')->name('tickets.expired');
Route::get('/tickets/closed', 'Main\Tickets\TicketResourceController@closed')->name('tickets.closed');
Route::get('/tickets/download/{file}', 'Main\Tickets\TicketResourceController@downloadFile')->name('tickets.downloadFile');
Route::post('/tickets/complete/{ticket}', 'Main\Tickets\TicketResourceController@markAsComplete')->name('tickets.markAsComplete');
Route::post('/tickets/close/{ticket}', 'Main\Tickets\TicketResourceController@markAsClosed')->name('tickets.markAsClosed');
Route::match(['patch', 'put'], '/ticket/attachFile/{ticket}', 'Main\Tickets\TicketResourceController@attachFile')->name('tickets.attachFile');
Route::match(['patch', 'put'], '/ticket/comment/{ticket}', 'Main\Tickets\TicketResourceController@addComment')->name('tickets.addComment');

Route::resource('/tickets', 'Main\Tickets\TicketResourceController');
