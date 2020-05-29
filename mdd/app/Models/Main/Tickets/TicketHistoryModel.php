<?php

namespace App\Models\Main\Tickets;

use App\Models\Main\Employees\EmployeeModel;
use App\Models\Service\Lists\ListTicketHistoryTypeModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TicketHistoryModel extends Model
{
    protected $primaryKey = 'idTicketHistory';
    protected $table = 'ticket_history';

    public function getEmployeeInitials() {
        $employee = $this->hasOne(EmployeeModel::class, 'idEmployee', 'idEmployee')->first();

        return $employee->firstName . ' ' . $employee->secondName;
    }

    public function getTicketHistoryType() {
        return $this->hasOne(ListTicketHistoryTypeModel::class,'idTicketHistoryType', 'idTicketHistoryType')->first();
    }

    public function getCreatedDate() {
        return date_format( date_create($this->created_at), 'd.m.Y / H:i');
    }

    public function getAttachedFiles() {
        print_r($this->created_at->format('Y-m-d H:i'));
        $files = DB::table('ticket_history as th')
            ->join('ticket_file as tf', 'tf.idTicket', '=', 'th.idTicket')
            ->where('tf.idTicket', '=', $this->idTicket)
            ->where('tf.created_at', '=', $this->created_at)
            ->get();


        dd($files);
    }

}
