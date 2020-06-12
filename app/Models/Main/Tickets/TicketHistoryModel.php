<?php

namespace App\Models\Main\Tickets;

use App\Core\Config\ListDatabaseTable;
use App\Core\Constants\ListTicketHistoryTypeConstants;
use App\Models\Main\Staff\EmployeeModel;
use App\Models\Service\Lists\ListTicketHistoryTypeModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class TicketHistoryModel extends Model
{
    protected $table = ListDatabaseTable::TABLE_TICKET_HISTORY;
    protected $primaryKey = 'idTicketHistory';
    protected $date_format = 'd.m.Y / H:i:s';

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }

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

    public function getComments() {
        $comments = $this->hasOne(TicketCommentModel::class, 'idTicket', 'idTicket')
            ->where('idTicket', '=', $this->idTicket)
            ->where('idEmployee', '=', $this->idEmployee)
            ->where('created_at', '=', $this->created_at)
            # ->whereRaw('DATE_FORMAT(created_at, \'%d.%m.%Y %H:%i\') = DATE_FORMAT(?, \'%d.%m.%Y %H:%i\')', [$this->created_at])
            ->first();

        return $comments ?? new TicketCommentModel();
    }

    public function getAttachedFiles() {
        $files = $this->hasOne(TicketFileModel::class, 'idTicket', 'idTicket')
            ->where('idTicket', '=', $this->idTicket)
            ->where('idEmployee', '=', $this->idEmployee)
            ->where('created_at', '=', $this->created_at)
            ->get();

        return $files ?? new TicketFileModel();
    }

}
