<?php

namespace App\Http\Controllers;

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
        return view('home');
    }

}
