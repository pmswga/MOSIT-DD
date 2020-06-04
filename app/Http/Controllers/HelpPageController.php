<?php

namespace App\Http\Controllers;

use App\Core\Constants\ListEmployeePostConstants;
use App\Models\Main\Staff\EmployeeModel;
use Illuminate\Http\Request;

class HelpPageController extends Controller
{

    public function index() {
        return view('systems.service.help.help_index');
    }

    public function manual() {
        return view('manual');
    }

    public function employeeList() {
        return view('systems.service.help.employee_list', [
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

}
