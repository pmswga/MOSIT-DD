<?php

namespace App\Models\Main\Tickets;

use App\Models\Main\Employees\EmployeeModel;
use App\Models\Service\Lists\ListTicketTypeModel;
use Illuminate\Database\Eloquent\Model;

class TicketModel extends Model
{
    protected $table = 'tickets';
    protected $primaryKey = 'idTicket';
    protected $date_format;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->date_format = 'd.m.Y / H:i:s';
    }


    public function getAuthor() {
        return $this->hasOne(EmployeeModel::class, 'idEmployee', 'idAuthor')->get()->first();
    }

    public function getResponsibleEmployees () {
        $responsibleEmployeeList = $this->hasOne(TicketEmployeeModel::class, 'idTicket', 'idTicket')->get();

        $employees = [];
        foreach ($responsibleEmployeeList as $responsibleEmployee) {
            $employees[] = EmployeeModel::all()->where('idEmployee', $responsibleEmployee->idEmployee)->first();
        }

        if ($employees) {
            return $employees;
        }

        return null;
    }

    public function getTicketType() {
        return $this->hasOne(ListTicketTypeModel::class, 'idTicketType', 'idTicketType')->get()->first();
    }

    public function getStartDate() {
        return date_format(date_create($this->startDate), $this->date_format);
    }

    public function getEndDate() {
        return date_format(date_create($this->endDate), $this->date_format);
    }

    public function getCreatedDate() {
        return date_format(date_create($this->created_at), $this->date_format);
    }

    public function getUpdatedDate() {
        return date_format(date_create($this->updated_at), $this->date_format);
    }

}
