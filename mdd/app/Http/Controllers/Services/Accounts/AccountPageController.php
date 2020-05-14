<?php

namespace App\Http\Controllers\Services\Accounts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountPageController extends Controller
{

    public function profile() {
        return view('accounts.profile');
    }

    public function admin() {
        return view('accounts.admin');
    }

    public function home() {

        switch (Auth::user()->getIdAccountType()) {
            case 1: {
                $ips = Auth::user()->getEmployee()->getTeacher()->getIPS();

                return view('home', [
                    'ips' => $ips
                ]);
            } break;
        }

    }

}
