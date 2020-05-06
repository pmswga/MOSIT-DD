<?php

namespace App\Http\Controllers\Services\Accounts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AccountPageController extends Controller
{

    public function profile() {
        return view('accounts.profile');
    }

    public function admin() {
        return view('accounts.admin');
    }

    public function methodistIndex() {
        return view('accounts.methodist');
    }

    public function teacherIndex() {
        return view('accounts.teacher');
    }

}
