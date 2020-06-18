<?php

namespace App\Models\Main\Staff;

use App\Core\Config\ListDatabaseTable;
use App\Models\Main\Storage\EmployeeFileModel;
use App\Models\Main\Tickets\EmployeeTicketModel;
use App\Models\Main\Tickets\TicketModel;
use App\Models\Service\Lists\ListEmployeePostModel;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Null_;

class EmployeeModel extends Model
{
    protected $table = ListDatabaseTable::TABLE_EMPLOYEES;
    protected $primaryKey = "idEmployee";

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }

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
        return $this->hasOne(ListFacultyModel::class, 'idFaculty', 'idFaculty')->first();
    }

    public function getPost() {
        return $this->hasOne(ListEmployeePostModel::class, 'idEmployeePost', 'idEmployeePost')->first();
    }

    public function getAccountId() {
        return $this->idEmployee;
    }

    public function getTeacher() {
        return $this->hasOne(TeacherModel::class, 'idEmployee', 'idEmployee')->first();
    }

    public function getChief() {
        $chiefId = $this->hasOne(EmployeeHierarchyModel::class, 'idEmployeeSub', 'idEmployee')->get()->first();

        if ($chiefId) {
            return EmployeeModel::all()->where('idEmployee', $chiefId->idEmployeeSup)->first();
        }

        return null;
    }

    public function getSubordinateEmployees() {
        $employeeList = $this->hasOne(EmployeeHierarchyModel::class, 'idEmployeeSup', 'idEmployee')->get();

        $employees = [];
        foreach ($employeeList as $employee) {
            $employees[] = $employee->getEmployeeSup();
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
        $inboxTicketList = $this->hasOne(EmployeeTicketModel::class,'idEmployee', 'idEmployee')
            ->where('isSeen', '0')
            ->get();

        $tickets = [];
        foreach ($inboxTicketList as $ticket) {
            $tickets[] = TicketModel::all()->where('idTicket', $ticket->idTicket)->first();
        }

        return $tickets;
    }

    public function getUnseenTicketsCount() {
        return $this->hasOne(EmployeeTicketModel::class,'idEmployee', 'idEmployee')
            ->where('isSeen', '0')
            ->get()
            ->count();
    }

    public function getExpiredTickets() {
        $expiredTicketList = $this->hasOne(EmployeeTicketModel::class,'idEmployee', 'idEmployee')
            ->join('tickets as t', 't.idTicket', '=', 'employee_tickets.idTicket')
            ->whereDate('t.endDate', '<=', Carbon::today()->toDateString())
            ->get();

        $tickets = [];
        foreach ($expiredTicketList as $ticket) {
            $tickets[] = TicketModel::all()->where('idTicket', $ticket->idTicket)->first();
        }

        return $tickets;
    }

    public function getExpiredTicketsCount() {
        return $this->hasOne(EmployeeTicketModel::class,'idEmployee', 'idEmployee')
            ->join('tickets as t', 't.idTicket', '=', 'employee_tickets.idTicket')
            ->whereDate('t.endDate', '<=', Carbon::today()->toDateString())
            ->get()
            ->count();
    }

    public function getAssignedTicketsCount() {
        return $this->hasOne(EmployeeTicketModel::class,'idEmployee', 'idEmployee')
            ->join('tickets as t', 't.idTicket', '=', 'employee_tickets.idTicket')
            ->get()
            ->count();
    }

    public function getAssignedTickets() {
        $assignedTicketList = $this->hasOne(EmployeeTicketModel::class,'idEmployee', 'idEmployee')->get();

        $tickets = [];
        foreach ($assignedTicketList as $assignedTicket) {
            $tickets[] = TicketModel::all()->where('idTicket', $assignedTicket->idTicket)->first();
        }

        if ($tickets) {
            return $tickets;
        }

        return null;
    }

    public function getFilesByTag(int $fileTag) {
        return $this->hasOne(EmployeeFileModel::class, 'idEmployee', 'idEmployee')
            ->where('idFileTag', '=', $fileTag)
            ->get();
    }

    public function getFiles() {
        return $this->hasOne(EmployeeFileModel::class, 'idEmployee', 'idEmployee')
            ->where('inTrash', '=', false)
            ->get();
    }

    public function getFilesInTrash() {
        return $this->hasOne(EmployeeFileModel::class, 'idEmployee', 'idEmployee')
            ->where('inTrash', '=', true)
            ->get();
    }

}
