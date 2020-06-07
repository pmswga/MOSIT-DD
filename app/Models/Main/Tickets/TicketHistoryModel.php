<?php

namespace App\Models\Main\Tickets;

use App\Core\Config\ListDatabaseTable;
use App\Core\Constants\ListTicketHistoryTypeConstants;
use App\Models\Main\Staff\EmployeeModel;
use App\Models\Service\Lists\ListTicketHistoryTypeModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TicketHistoryModel extends Model
{
    protected $table = ListDatabaseTable::TABLE_TICKET_HISTORY;
    protected $primaryKey = 'idTicketHistory';
    protected $date_format = 'd.m.Y / H:i';

    public function getEmployee() {
        return $this->hasOne(EmployeeModel::class, 'idEmployee', 'idEmployee')->first();
    }

    public function getEmployeeInitials() {
        $employee = $this->hasOne(EmployeeModel::class, 'idEmployee', 'idEmployee')->first();

        return $employee->firstName . ' ' . $employee->secondName;
    }

    public function getTicketHistoryType() {
        return $this->hasOne(ListTicketHistoryTypeModel::class,'idTicketHistoryType', 'idTicketHistoryType')->first();
    }

    public function getCreatedDate() {
        return $this->created_at->format($this->date_format);
    }

    public function getUpdatedDate() {
        return $this->updated_at->format($this->date_format);
    }

    public function getComment() {
        $comments = $this->hasOne(TicketCommentModel::class, 'idTicket', 'idTicket')
            ->where('idTicket', '=', $this->idTicket)
            ->where('idEmployee', '=', $this->idEmployee)
            ->where('created_at', '=', $this->created_at)
            ->first();

        return $comments ?? new TicketCommentModel();
    }

    public function getAttachedFiles() {

        $files = $this->hasOne(TicketFileModel::class, 'idTicket', 'idTicket')
            ->where('idTicket', '=', $this->idTicket)
            ->where('idEmployee', '=', $this->idEmployee)
            ->where('created_at', '=', $this->created_at)
            ->get();

        #$files = DB::table('ticket_history as th')
        #    ->join('ticket_files as tf', 'tf.idTicket', '=', 'th.idTicket')
        #    ->where('th.idTicket', '=', $this->idTicket)
        #    ->where('th.idTicketHistoryType', '=', ListTicketHistoryTypeConstants::ATTACH_FILE)
        #    ->where('tf.created_at', '=', $this->created_at)
        #    ->get();

        #dd($files);

        return $files;
    }

}
