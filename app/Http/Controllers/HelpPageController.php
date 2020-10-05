<?php

namespace App\Http\Controllers;

use App\Core\Constants\ListEmployeePostConstants;
use App\Models\Main\Staff\EmployeeModel;
use Illuminate\Http\Request;

/**
 * @class HelpPageController
 * @brief Страничный контроллер справочной информации
 *
 * @package App\Http\Controllers
 */
class HelpPageController extends Controller
{

    /**
     * HelpPageController конструктор
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Возвращает главную страницу справочника
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index() {
        return view('systems.service.help.index',  [
            'leadership' => EmployeeModel::all()
                ->whereNotIn('idEmployeePost', [
                    ListEmployeePostConstants::TEACHER,
                    ListEmployeePostConstants::OPERATOR
                ]),
            'employees' => EmployeeModel::all()
                ->whereIn('idEmployeePost', [
                    ListEmployeePostConstants::TEACHER,
                    ListEmployeePostConstants::OPERATOR
                ])
        ]);
    }

    /**
     * Возвращает страницу руководства пользователя
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function manual() {
        return view('systems.service.help.manual');
    }

}
