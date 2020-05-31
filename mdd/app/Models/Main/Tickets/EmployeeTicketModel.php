<?php

namespace App\Models\Main\Tickets;

use Illuminate\Database\Eloquent\Model;

class EmployeeTicketModel extends Model
{
    protected $table = 'employee_tickets';
    protected $primaryKey = 'idEmployeeTicket';
    public $timestamps = false;

}
