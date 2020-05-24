<?php

namespace App\Models\Main\Tickets;

use Illuminate\Database\Eloquent\Model;

class TicketEmployeeModel extends Model
{
    protected $table = 'ticket_employee';
    protected $primaryKey = 'idTicketEmployee';
    public $timestamps = false;

}
