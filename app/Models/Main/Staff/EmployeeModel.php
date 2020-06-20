<?php

namespace App\Models\Main\Staff;

use App\Core\Config\ListDatabaseTable;
use App\Core\Constants\ListRateTypeConstants;
use App\Models\Main\Storage\EmployeeFileModel;
use App\Models\Main\Tickets\EmployeeTicketModel;
use App\Models\Main\Tickets\TicketModel;
use App\Models\Service\Accounts\AccountRightsModel;
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

    public function getTeacher() {
        return $this->hasOne(TeacherModel::class, 'idTeacher', 'idEmployee')->first();
    }

    public function setRate($rateType, $rateValue) {
        switch ($rateType)
        {
            case ListRateTypeConstants::STAFF:
            {
                $currentRate = $this->getStaffRate();
                if ($currentRate) {
                    $currentRate->rateValue = $rateValue;
                    return $currentRate->save();
                }
            } break;
            case ListRateTypeConstants::INTERNAL:
            {
                $currentRate = $this->getInternalRate();
                if ($currentRate) {
                    $currentRate->rateValue = $rateValue;
                    return $currentRate->save();
                }
            } break;
            case ListRateTypeConstants::EXTERNAL:
            {
                $currentRate = $this->getExternalRate();
                if ($currentRate) {
                    $currentRate->rateValue = $rateValue;
                    return $currentRate->save();
                }
            } break;
        }

        $currentRate = new RateModel();
        $currentRate->idEmployee = $this->idEmployee;
        $currentRate->idRateType = $rateType;
        $currentRate->rateValue = $rateValue;

        return $currentRate->save();
    }

    public function getStaffRate() {
        return $this->hasOne(RateModel::class, 'idEmployee', 'idEmployee')
            ->where('idRateType', '=', ListRateTypeConstants::STAFF)
            ->first();
    }

    public function getInternalRate() {
        return $this->hasOne(RateModel::class, 'idEmployee', 'idEmployee')
            ->where('idRateType', '=', ListRateTypeConstants::INTERNAL)
            ->first();
    }

    public function getExternalRate() {
        return $this->hasOne(RateModel::class, 'idEmployee', 'idEmployee')
            ->where('idRateType', '=', ListRateTypeConstants::EXTERNAL)
            ->first();
    }

    public function getRates() {
        $rates = $this->hasMany(RateModel::class, 'idEmployee', 'idEmployee')->get();

        if ($rates->isNotEmpty()) {
            return $rates;
        }

        return null;
    }


    public function getChief() {
        $chiefId = $this->hasOne(EmployeeHierarchyModel::class, 'idEmployeeSub', 'idEmployee')->get()->first();

        if ($chiefId) {
            return EmployeeModel::all()->where('idEmployee', $chiefId->idEmployeeSup)->first();
        }

        return null;
    }

    public function getSubordinateEmployees() {
        $employeeList = $this->hasMany(EmployeeHierarchyModel::class, 'idEmployeeSup', 'idEmployee')->get();

        $employeeList = $employeeList->map(function ($value) {
            return $value->getEmployeeSup();
        });

        return $employeeList;
    }

    public function getCreatedTickets() {
        $createdTicketList = $this->hasOne(TicketModel::class, 'idAuthor', 'idEmployee')->get();

        if ($createdTicketList) {
            return $createdTicketList;
        }

        return null;
    }

    public function getInboxTickets() {
        $inboxTickets = $this->hasOne(EmployeeTicketModel::class,'idEmployee', 'idEmployee')
            ->where('isSeen', '0')
            ->get();

        $inboxTickets = $inboxTickets->map(function ($value) {
            return $value->getTicket();
        });

        return $inboxTickets;
    }

    public function getExpiredTickets() {
        $expiredTickets = $this->hasOne(EmployeeTicketModel::class,'idEmployee', 'idEmployee')
            ->join('tickets as t', 't.idTicket', '=', 'employee_tickets.idTicket')
            ->whereDate('t.endDate', '<=', Carbon::today()->toDateString())
            ->get();

        $expiredTickets = $expiredTickets->map(function ($value) {
            return $value->getTicket();
        });

        return $expiredTickets;
    }

    public function getAssignedTickets() {
        $assignedTickets = $this->hasOne(EmployeeTicketModel::class,'idEmployee', 'idEmployee')->get();

        $assignedTickets = $assignedTickets->map(function ($value) {
            return $value->getTicket();
        });

        return $assignedTickets;
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
