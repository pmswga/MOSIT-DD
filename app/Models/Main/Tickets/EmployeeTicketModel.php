<?php

namespace App\Models\Main\Tickets;

use App\Core\Config\ListDatabaseTable;
use App\Models\Main\Staff\EmployeeModel;
use Illuminate\Database\Eloquent\Model;

class EmployeeTicketModel extends Model
{
    protected $table = ListDatabaseTable::TABLE_EMPLOYEE_TICKETS;
    protected $primaryKey = 'idEmployeeTicket';
    public $timestamps = false;

    public function getEmployee() {
        return $this->hasOne(EmployeeModel::class, 'idEmployee', 'idEmployee')->first();
    }

    public function getTicket() {
        return $this->hasOne(TicketModel::class, 'idTicket', 'idTicket')->first();
    }

    public function isSeen() {
        return $this->isSeen;
    }

}
