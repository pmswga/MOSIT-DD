<?php

namespace App\Http\Controllers;

use App\Core\Constants\ListEmployeePostConstants;
use App\Models\Main\Staff\EmployeeModel;
use Illuminate\Http\Request;

class HelpPageController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

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

    public function manual() {
        return view('systems.service.help.manual');
    }

}
