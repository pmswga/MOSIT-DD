<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'MainPageController@index')->name('admin.index');



Route::resource('accounts', 'Service\Accounts\AccountResourceController');

Route::resource('employees', 'Main\Employees\EmployeeResourceController');



Route::get( 'rights', function () { // #fixme Исправить
    $rawRights = \Illuminate\Support\Facades\DB::table('accounts as ac')
        ->select('ac.idAccount', 'ac.email', 'lss.idSubSystem', 'lss.caption', 'ar.isAccess', 'ar.isViewAny', 'ar.isView', 'ar.isCreate', 'ar.isUpdate', 'ar.isDelete')
        ->join('account_rights as ar', 'ar.idAccount', '=', 'ac.idAccount')
        ->join('list_sub_system as lss', 'lss.idSubSystem', '=', 'ar.idSubSystem')
        ->get();

    $rights = [];

    foreach ($rawRights as $rawRight) {
        $rights[$rawRight->email][] = $rawRight;
    }

    return view('system.service.accounts.account_rights', [
        'rights' => $rights
    ]);
})->name('accounts.rights');

