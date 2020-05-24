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

    public function getTicketType() {
        return $this->hasOne(ListTicketTypeModel::class, 'idTicketType', 'idTicketType')->get()->first();
    }

}
