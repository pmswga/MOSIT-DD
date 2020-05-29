<?php

namespace App\Models\Main\Employees;

use App\Models\Main\Tickets\TicketEmployeeModel;
use App\Models\Main\Tickets\TicketModel;
use App\Models\Service\Lists\ListEmployeePostModel;
use Carbon\Carbon;
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

    public function getPersonalEmail() {
        return $this->personalEmail;
    }

    public function getFaculty() {
        $faculty = DB::table('list_faculty') // #todo create model for this join
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

    public function getPost() {
        return $this->hasOne(ListEmployeePostModel::class, 'idEmployeePost', 'idEmployeePost')->first()->getCaption();
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

    public function getCreatedTickets() {
        $createdTicketList = $this->hasOne(TicketModel::class, 'idAuthor', 'idEmployee')->get();

        if ($createdTicketList) {
            return $createdTicketList;
        }

        return null;
    }

    public function getUnseenTickets() {
        $inboxTicketList = $this->hasOne(TicketEmployeeModel::class,'idEmployee', 'idEmployee')
            ->where('isSeen', '0')
            ->get();

        $tickets = [];
        foreach ($inboxTicketList as $ticket) {
            $tickets[] = TicketModel::all()->where('idTicket', $ticket->idTicket)->first();
        }

        return $tickets;
    }

    public function getUnseenTicketsCount() {
        return $this->hasOne(TicketEmployeeModel::class,'idEmployee', 'idEmployee')
            ->where('isSeen', '0')
            ->get()
            ->count();
    }

    public function getExpiredTickets() {
        $expiredTicketList = $this->hasOne(TicketEmployeeModel::class,'idEmployee', 'idEmployee')
            ->join('Tickets as t', 't.idTicket', '=', 'ticket_employee.idTicket')
            ->whereDate('t.endDate', '<=', Carbon::today()->toDateString())
            ->get();

        $tickets = [];
        foreach ($expiredTicketList as $ticket) {
            $tickets[] = TicketModel::all()->where('idTicket', $ticket->idTicket)->first();
        }

        return $tickets;
    }

    public function getExpiredTicketsCount() {
        return $this->hasOne(TicketEmployeeModel::class,'idEmployee', 'idEmployee')
            ->join('Tickets as t', 't.idTicket', '=', 'ticket_employee.idTicket')
            ->whereDate('t.endDate', '<=', Carbon::today()->toDateString())
            ->get()
            ->count();
    }

    public function getAssignedTicketsCount() {
        return $this->hasOne(TicketEmployeeModel::class,'idEmployee', 'idEmployee')
            ->join('Tickets as t', 't.idTicket', '=', 'ticket_employee.idTicket')
            ->get()
            ->count();
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



}
