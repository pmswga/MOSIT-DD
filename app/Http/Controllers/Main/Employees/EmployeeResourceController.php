<?php

namespace App\Http\Controllers\Main\Employees;

use App\Core\Config\ListMessageCode;
use App\Core\Constants\ListEmployeePostConstants;
use App\Http\Controllers\Controller;
use App\Models\Main\Staff\EmployeeModel;
use App\Models\Main\Staff\ListFacultyModel;
use App\Models\Main\Staff\ListInstituteModel;
use App\Models\Service\Lists\ListEmployeePostModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use MongoDB\Driver\Session as SessionAlias;

class EmployeeResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('system.main.staff.employees.index', [
            'employees' => EmployeeModel::all()->sortBy('secondName')
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $faculties = ListFacultyModel::all();

        $faculties = $faculties->mapToGroups(function ($item, $key) {
            return [$item->getInstitute()->getCaption() => $item];
        });

        $leaderships = EmployeeModel::all()->whereNotIn('idEmployeePost', [ListEmployeePostConstants::TEACHER]);

        $employeesPost = ListEmployeePostModel::all()->sortBy('caption');


        return view('system.main.staff.employees.components.create', [
            'faculties' => $faculties,
            'employeePosts' => $employeesPost,
            'leaderships' => $leaderships
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $employee = new EmployeeModel();
        $employee->secondName = $request->secondName;
        $employee->firstName = $request->firstName;
        $employee->patronymic = $request->patronymic;
        $employee->personalPhone = $request->personalPhone;
        $employee->personalEmail = $request->personalEmail;
        $employee->idFaculty = $request->faculty;
        $employee->idEmployeePost = $request->employeePost;

        try {
            DB::beginTransaction();

            if (!$employee->save()) {
                throw new \Exception('Не удалось добавить сотрудника', ListMessageCode::ERROR);
            }

            if (!$employee->setLeadership($request->leadership)) {
                throw new \Exception('Не удалось добавить сотрудника', ListMessageCode::ERROR);
            }

            DB::commit();

            Session::flash('message', ['type' => 'success', 'message' => 'Сотрудник добавлен']);
            return back();
        } catch (\Exception $e) {
            DB::rollback();

            Session::flash('message', ['type' => ListMessageCode::getType($e->getCode()), 'message' => $e->getMessage()]);
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Main\Staff\EmployeeModel  $employeeModel
     * @return \Illuminate\Http\Response
     */
    public function show(EmployeeModel $employeeModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Main\Staff\EmployeeModel  $employeeModel
     * @return \Illuminate\Http\Response
     */
    public function edit(EmployeeModel $employeeModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Main\Staff\EmployeeModel  $employeeModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EmployeeModel $employeeModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Main\Staff\EmployeeModel  $employeeModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(EmployeeModel $employeeModel)
    {
        //
    }
}
