<?php

namespace App\Models\Main\Tickets;

use App\Core\Config\ListDatabaseTable;
use Illuminate\Database\Eloquent\Model;

class EmployeeTicketModel extends Model
{
    protected $table = ListDatabaseTable::TABLE_EMPLOYEE_TICKETS;
    protected $primaryKey = 'idEmployeeTicket';
    public $timestamps = false;

}
