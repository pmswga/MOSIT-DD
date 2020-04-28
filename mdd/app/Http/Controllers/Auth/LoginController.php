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
    protected $redirectTo = RouteServiceProvider::HOME;

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
                switch (User::all()->where("idAccount", Auth::id())->first()->getIdAccountType()) {
                    case "1": {
                        $home = "teacher.index";
                    } break;
                    case '2': {
                        $home = "methodist.index";
                    } break;
                    case '3': {
                        $home = "deputy-edu-work.index";
                    } break;
                    case '4': {
                        $home = "deputy-science-work.index";
                    } break;
                    case '5': {
                        $home = "deputy-edu-metho-work.index";
                    } break;
                    case '6': {
                        $home = "deputy-mto.index";
                    } break;
                    case '7': {
                        $home = "deputy-students.index";
                    } break;
                    case '8': {
                        $home = "science-secretary.index";
                    } break;
                    case '9': {
                        $home = "head-faculty.index";
                    } break;
                    case '10': {
                        $home = "admin.index";
                    } break;
                }

                return redirect()->route($home);
            } else {

            }
        } else {
            return  back()->withErrors(['userNotFoundError' => "Пользователь не найден"]);
        }
    }

}
