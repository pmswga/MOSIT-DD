<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\URL;
use Symfony\Component\Console\Input\Input;
use Illuminate\Support\Facades\Route;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = 'home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function checkUser($email, $password) {
        $user = DB::table('Accounts')->where([
            ['email', '=', $email]
        ])->get()->first();

        if ($user) {
            return Hash::check($password, $user->password);
        }

        return false;
    }

    public function login(Request $request)
    {
        $credential = $request->only('email', 'password');

        if ($this->checkUser($credential['email'], $credential['password'])) {
            if (Auth::attempt($credential)) {
                return redirect()->route($this->redirectTo);
            } else {
                return  back()->withErrors(['error' => "Произошла ошибка авторизации"]);
            }
        } else {
            return  back()->withErrors(['error' => "Пользователь не найден"]);
        }
    }

}
