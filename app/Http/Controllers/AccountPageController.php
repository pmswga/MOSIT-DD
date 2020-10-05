<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * @class AccountPageController
 * @brief Контроллер возвращает представления страниц
 *
 * @package App\Http\Controllers
 */
class AccountPageController extends Controller
{

    /**
     * AccountPageController конструктор.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Возвращает страницу профиля авторизированного пользователя
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function profile() {
        return view('profile');
    }

    /**
     * Возвращает главную страницу панели администратора
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function admin() {
        return view('admin.index');
    }

    /**
     * Возвращает представление главной страницы
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function home() {
        return view('home');
    }

}
