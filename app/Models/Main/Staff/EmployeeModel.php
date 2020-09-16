<?php

namespace App\Models\Main\Staff;

use App\Core\Config\ListDatabaseTable;
use App\Core\Constants\ListRateTypeConstants;
use App\Core\Constants\ListTicketStatusConstants;
use App\Models\Main\Storage\EmployeeFileModel;
use App\Models\Main\Storage\ListFileTagModel;
use App\Models\Main\Tickets\EmployeeTicketModel;
use App\Models\Main\Tickets\TicketModel;
use App\Models\Service\Accounts\AccountRightsModel;
use App\Models\Service\Lists\ListEmployeePostModel;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Null_;

/**
 * @class EmployeeModel
 * @brief Модель сотрудника
 *
 * @package App\Models\Main\Staff
 */
class EmployeeModel extends Model
{
    protected $table = ListDatabaseTable::TABLE_EMPLOYEES; ///< Соответствующая таблица в базе данных
    protected $primaryKey = "idEmployee"; ///< Первичный ключ

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }

    /**
     * Возвращает фамилию сотрудника
     * @return string
     */
    public function getSecondName() {
        return $this->secondName;
    }

    /**
     * Возвращает имя сотрудника
     * @return string
     */
    public function getFirstName() {
        return $this->firstName;
    }

    /**
     * Возвращает отчество сотрудника
     * @return string
     */
    public function getPatronymic() {
        return $this->patronymic;
    }

    /**
     * Возвращает инициалы сотрудника
     * Например, Иванов Иван Иваныч
     * @return string
     */
    public function getFullInitials() {
        return $this->secondName.' '.$this->firstName.' '.$this->patronymic;
    }

    /**
     * Возвращает персоналный телефон сотрудника
     * @return string
     */
    public function getPersonalPhone() {
        return $this->personalPhone;
    }

    /**
     * Возвращает персональный электронный адрес сотрудника
     * @return string
     */
    public function getPersonalEmail() {
        return $this->personalEmail;
    }

    /**
     * Возвращает кафедру, к которой прикреплён сотрудник
     * @return ListFacultyModel
     */
    public function getFaculty() {
        return $this->hasOne(ListFacultyModel::class, 'idFaculty', 'idFaculty')->first();
    }

    /**
     * Возвращает должность сотрудника
     * @return ListEmployeePostModel
     */
    public function getPost() {
        return $this->hasOne(ListEmployeePostModel::class, 'idEmployeePost', 'idEmployeePost')->first();
    }

    /**
     * Возвращает информацию о преподавателе
     * @return TeacherModel
     */
    public function getTeacher() {
        return $this->hasOne(TeacherModel::class, 'idTeacher', 'idEmployee')->first();
    }

    /**
     * Возвращает должность сотрудника
     * @return ListEmployeePostModel
     */
    public function getEmployeePost() {
        return $this->hasOne(ListEmployeePostModel::class, 'idEmployeePost', 'idEmployeePost')->first();
    }

    /**
     * Задаёт значение ставки для указанного типа.
     *
     * Например:
     * \code{.php}
     *  $employee->setRate(ListRateTypeConstants::STAFF, 0.5);
     * \endcode
     *
     * @param $rateType - тип ставки
     * @param $rateValue - значение ставки
     * @return bool
     */
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

    /**
     * Возвращает штатную ставку сотрудника
     * @return RateModel
     */
    public function getStaffRate() {
        return $this->hasOne(RateModel::class, 'idEmployee', 'idEmployee')
            ->where('idRateType', '=', ListRateTypeConstants::STAFF)
            ->first();
    }

    /**
     * Возвращает внутреннюю ставку сотрудника
     * @return RateModel
     */
    public function getInternalRate() {
        return $this->hasOne(RateModel::class, 'idEmployee', 'idEmployee')
            ->where('idRateType', '=', ListRateTypeConstants::INTERNAL)
            ->first();
    }

    /**
     * Возвращает внешнюю ставку сотрудника
     * @return RateModel
     */
    public function getExternalRate() {
        return $this->hasOne(RateModel::class, 'idEmployee', 'idEmployee')
            ->where('idRateType', '=', ListRateTypeConstants::EXTERNAL)
            ->first();
    }

    /**
     * Возвращает все ставки сотрудника. Всего ставок может быть три.
     * @return RateModel[]
     */
    public function getRates() {
        return $this->hasMany(RateModel::class, 'idEmployee', 'idEmployee')->get();
    }

    /**
     * Возвращает информацию о начальнике сотрудника
     * @return EmployeeModel
     */
    public function getChief() {
        $chiefId = $this->hasOne(EmployeeHierarchyModel::class, 'idEmployeeSub', 'idEmployee')->get()->first();

        if ($chiefId) {
            return EmployeeModel::all()->where('idEmployee', $chiefId->idEmployeeSup)->first();
        }

        return null;
    }

    /**
     * Возвращает список подчинённых сотрудников
     * @return EmployeeModel[]
     */
    public function getSubordinateEmployees() {
        $employeeList = $this->hasOne(EmployeeHierarchyModel::class, 'idEmployeeSup', 'idEmployee')->get();

        $employeeList = $employeeList->map(function ($value) {
            return $value->getEmployeeSub();
        });

        return $employeeList;
    }

    /**
     * Возвращет список созданных сотрудником поручений
     * @return TicketModel[]
     */
    public function getCreatedTickets() {
        $createdTicketList = $this->hasOne(TicketModel::class, 'idAuthor', 'idEmployee')->get();

        if ($createdTicketList) {
            return $createdTicketList;
        }

        return null;
    }

    /**
     * Возвращает список входящих (непросмотренных) поручений
     * @return TicketModel[]
     */
    public function getInboxTickets() {
        $inboxTickets = $this->hasOne(EmployeeTicketModel::class,'idEmployee', 'idEmployee')
            ->where('isSeen', '0')
            ->get();

        $inboxTickets = $inboxTickets->mapToGroups(function ($value) {
            return $value->getTicket();
        });

        return $inboxTickets;
    }

    /**
     * Возвращает список просроченных поручений, назначенных сотруднику
     * @return TicketModel[]
     */
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

    /**
     * Возвращает список всех поручений, назначенных сотруднику
     * @return TicketModel[]
     */
    public function getAssignedTickets() {
        $assignedTickets = $this->hasOne(EmployeeTicketModel::class,'idEmployee', 'idEmployee')
            ->join(ListDatabaseTable::TABLE_TICKETS,
                ListDatabaseTable::TABLE_TICKETS.'.idTicket',
                '=',
                ListDatabaseTable::TABLE_EMPLOYEE_TICKETS.'.idTicket')
            ->where(ListDatabaseTable::TABLE_TICKETS.'.idTicketStatus', '=', ListTicketStatusConstants::OPENED)
            ->get();

        $assignedTickets = $assignedTickets->mapToGroups(function ($value) {
            return [$value->isSeen => $value->getTicket()];
        });

        return $assignedTickets;
    }

    /**
     * Возвращает список закрытых поручений, назначенных сотруднику
     * @return TicketModel[]
     */
    public function getClosedTickets() {
        $assignedTickets = $this->hasOne(EmployeeTicketModel::class,'idEmployee', 'idEmployee')
            ->join(ListDatabaseTable::TABLE_TICKETS,
                ListDatabaseTable::TABLE_TICKETS.'.idTicket',
                '=',
                ListDatabaseTable::TABLE_EMPLOYEE_TICKETS.'.idTicket')
            ->where(ListDatabaseTable::TABLE_TICKETS.'.idTicketStatus', '=', ListTicketStatusConstants::CLOSED)
            ->get();

        $assignedTickets = $assignedTickets->map(function ($value) {
            return $value->getTicket();
        });

        return $assignedTickets;
    }

    /**
     * Возвращает записи о загруженных файлах сотрудником по указанному тегу
     * @param int $fileTag - идентификатор метки файла. Принимает значения, перечисленные в ListFileTagModel
     * @return EmployeeFileModel[]
     */
    public function getFilesByTag(int $fileTag) {
        return $this->hasOne(EmployeeFileModel::class, 'idEmployee', 'idEmployee')
            ->where('idFileTag', '=', $fileTag)
            ->get();
    }

    /**
     * Возвращает список всех записей о загруженных файлов сотрудником
     * @return
     */
    public function getFiles() {
        return $this->hasOne(EmployeeFileModel::class, 'idEmployee', 'idEmployee')
            ->where('inTrash', '=', false)
            ->get();
    }

    /**
     * Возвращает список записей о файлах, перенесённых в коризну
     * @return EmployeeFileModel[]
     */
    public function getFilesInTrash() {
        return $this->hasOne(EmployeeFileModel::class, 'idEmployee', 'idEmployee')
            ->where('inTrash', '=', true)
            ->get();
    }

}
