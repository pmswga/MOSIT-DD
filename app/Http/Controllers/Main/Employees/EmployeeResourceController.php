<?php

namespace App\Http\Controllers\Main\Employees;

use App\Http\Controllers\Controller;
use App\Models\Main\Staff\EmployeeModel;
use Illuminate\Http\Request;

class EmployeeResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('systems.main.help.employees_index', [
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
