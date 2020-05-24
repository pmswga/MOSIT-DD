<?php

namespace App\Models\Main\Employees;

use App\Models\Main\Tickets\TicketEmployeeModel;
use App\Models\Main\Tickets\TicketModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Null_;

class EmployeeModel extends Model
{
    protected $table = "Employees";
    protected $primaryKey = "idEmployee";

    public function getSecondName() {
        return $this->secondName;
    }

    public function getFirstName() {
        return $this->firstName;
    }

    public function getPatronymic() {
        return $this->patronymic;
    }

    public function getFullInitials() {
        return $this->secondName.' '.$this->firstName.' '.$this->patronymic;
    }

    public function getPersonalPhone() {
        return $this->personalPhone;
    }

    public function getFaculty() {
        $faculty = DB::table('list_faculty')
            ->select('list_faculty.caption as faculty')
            ->where('list_faculty.idFaculty', '=', $this->idFaculty)
            ->get()->first();

        return $faculty->faculty; // #todo add error handler
    }

    public function getInstitute() {
        $institute = DB::table('list_faculty') // #todo create model for this join
            ->select('list_institute.caption as institute')
            ->join('list_institute', 'list_faculty.idInstitute', '=', 'list_institute.idInstitute')
            ->where('list_faculty.idFaculty', '=', $this->idFaculty)
            ->get()->first();

        return $institute->institute; // #todo add error handler
    }

    public function getAccountId() {
        return $this->idEmployee;
    }

    public function getTeacher() {
        $teacher = $this->hasOne(Teacher::class, 'idEmployee', 'idEmployee')->first();


        if ($teacher) {
            return $teacher;
        }

        return null;
    }

    public function getChief() {
        $chiefId = $this->hasOne(EmployeeHierarchyModel::class, 'idEmployeeSub', 'idEmployee')->get()->first();
        $chief = null;

        if ($chiefId) {
            $chief = EmployeeModel::all()->where('idEmployee', $chiefId->idEmployeeSuper)->first();
            return $chief;
        }

        return new EmployeeModel();
    }

    public function getAssignedTickets() {
        $assignedTicketList = $this->hasOne(TicketEmployeeModel::class,'idEmployee', 'idEmployee')->get();

        $tickets = [];
        foreach ($assignedTicketList as $assignedTicket) {
            $tickets[] = TicketModel::all()->where('idTicket', $assignedTicket->idTicket)->first();
        }

        if ($tickets) {
            return $tickets;
        }

        return null;
    }


    public function getSubordinateEmployees() {
        $employeeList = $this->hasOne(EmployeeHierarchyModel::class, 'idEmployeeSuper', 'idEmployee')->get();
        $employees = [];
        foreach ($employeeList as $employee) {
            $employees[] = EmployeeModel::all()->where('idEmployee', $employee->idEmployeeSub)->first();
        }

        if ($employees) {
            return $employees;
        }

        return null;
    }

}
