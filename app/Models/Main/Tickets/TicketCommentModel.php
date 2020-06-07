<?php

namespace App\Models\Main\Tickets;

use App\Core\Config\ListDatabaseTable;
use App\Models\Main\Staff\EmployeeModel;
use Illuminate\Database\Eloquent\Model;

class TicketCommentModel extends Model
{
    protected $table = ListDatabaseTable::TABLE_TICKET_COMMENTS;
    protected $primaryKey = 'idTicketComment';
    protected $date_format = 'd.m.Y / H:s';

    public function getTicket() {
        return $this->hasOne(TicketModel::class, 'idTicket', 'idTicket')->first();
    }

    public function getEmployee() {
        return $this->hasOne(EmployeeModel::class, 'idEmployee', 'idEmployee')->first();
    }

    public function getComment() {
        return $this->comment;
    }

    public function getCreatedDate() {
        return $this->created_at->format($this->date_format);
    }

    public function getUpdatedDate() {
        return $this->updated_at->format($this->date_format);
    }

}
