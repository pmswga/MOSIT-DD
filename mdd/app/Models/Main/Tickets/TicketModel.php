<?php

namespace App\Models\Main\Tickets;

use App\Models\Main\Employees\EmployeeModel;
use App\Models\Service\Lists\ListTicketTypeModel;
use Illuminate\Database\Eloquent\Model;

class TicketModel extends Model
{
    protected $table = 'tickets';
    protected $primaryKey = 'idTicket';


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

}
