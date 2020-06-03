<?php

namespace App\Models\Main\Tickets;

use App\Models\Main\Staff\EmployeeModel;
use App\Models\Service\Lists\ListTicketStatusModel;
use App\Models\Service\Lists\ListTicketTypeModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class TicketModel extends Model
{
    protected $table = 'tickets';
    protected $primaryKey = 'idTicket';
    protected $date_format = 'd.m.Y / H:i';

    public function getCaption() {
        return $this->caption;
    }

    public function getAuthor() {
        return $this->hasOne(EmployeeModel::class, 'idEmployee', 'idAuthor')->get()->first();
    }

    public function getResponsibleEmployees () {
        $responsibleEmployeeList = $this->hasOne(EmployeeTicketModel::class, 'idTicket', 'idTicket')->get();

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

    public function getTicketStatus() {
        return $this->hasOne(ListTicketStatusModel::class, 'idTicketStatus', 'idTicketStatus')->get()->first()->getCaption();
    }

    public function getStartDate() {
        return date_format(date_create($this->startDate), $this->date_format);
    }

    public function getEndDate() {
        return date_format(date_create($this->endDate), $this->date_format);
    }

    public function getCreatedDate() {
        return $this->created_at->format($this->date_format);
    }

    public function getUpdatedDate() {
        return $this->updated_at->format($this->date_format);
    }

    public function isExpired() {
        $endDate = Carbon::instance( date_create($this->endDate) );
        $nowDate = Carbon::today();

        return $nowDate > $endDate;
    }

    public function getAttachedFiles() {
        return $this->hasOne(TicketFileModel::class,'idTicket', 'idTicket')->get();
    }

    public function getHistory() {
        return $this->hasOne(TicketHistoryModel::class, 'idTicket', 'idTicket')->get();
    }

}
