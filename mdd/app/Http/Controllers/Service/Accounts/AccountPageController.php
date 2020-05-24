<?php

namespace App\Http\Controllers\Service\Accounts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountPageController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function profile() {
        return view('profile');
    }

    public function admin() {
        return view('admin.index');
    }

    public function home() {

        switch (Auth::user()->getIdAccountType()) {
            case \App\Core\Constants\ListAccountType::TEACHER: {
                $ips = Auth::user()->getEmployee()->getTeacher()->getIPS();

                return view('home', [
                    'ips' => $ips
                ]);
            } break;
            case \App\Core\Constants\ListAccountType::METHODIST:
            {
                return view('home');
            } break;
        }

    }

}
