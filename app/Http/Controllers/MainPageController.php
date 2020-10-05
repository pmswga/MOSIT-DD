<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * @class MainPageController
 * @brief Страничный контроллер
 *
 * @package App\Http\Controllers
 */
class MainPageController extends Controller
{

    /**
     * Возвращает главную страницу системы
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index() {
        return view('index');
    }

}
