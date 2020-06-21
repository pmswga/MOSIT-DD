<?php

namespace App\Models\Main\Tickets;

use App\Core\Config\ListDatabaseTable;
use App\Core\Constants\ListTicketStatusConstants;
use App\Models\Main\Staff\EmployeeModel;
use App\Models\Service\Lists\ListTicketStatusModel;
use App\Models\Service\Lists\ListTicketTypeModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class TicketModel extends Model
{
    protected $table = ListDatabaseTable::TABLE_TICKETS;
    protected $primaryKey = 'idTicket';
    protected $date_format = 'd.m.Y / H:i';

    public function getCaption() {
        return $this->caption;
    }

    public function getDescription() {
        return $this->description;
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
        return $this->hasOne(ListTicketTypeModel::class, 'idTicketType', 'idTicketType')->first();
    }

    public function getTicketStatus() {
        return $this->hasOne(ListTicketStatusModel::class, 'idTicketStatus', 'idTicketStatus')->first();
    }

    public function getStartDate() {
        return Carbon::createFromTimeString($this->startDate)->format($this->date_format);
    }

    public function getEndDate() {
        return Carbon::createFromTimeString($this->endDate)->format($this->date_format);
    }

    public function getCreatedDate() {
        return $this->created_at->format($this->date_format);
    }

    public function getUpdatedDate() {
        return $this->updated_at->format($this->date_format);
    }

    public function isExpired() {
        return Carbon::today() >= Carbon::createFromTimeString($this->endDate);
    }

    public function isOpen() {
        return $this->idTicketStatus === ListTicketStatusConstants::OPENED;
    }

    public function isClosed() {
        return $this->idTicketStatus === ListTicketStatusConstants::CLOSED;
    }

    public function assignEmployee(int $employeeId) {
        $ticketEmployee = new EmployeeTicketModel();
        $ticketEmployee->idEmployee = $employeeId;
        $ticketEmployee->idTicket = $this->idTicket;

        return $ticketEmployee->save();
    }

    public function addComment(int $employeeId, string $comment) {
        $ticketComment = new TicketCommentModel();
        $ticketComment->idTicket = $this->idTicket;
        $ticketComment->idEmployee = $employeeId;
        $ticketComment->comment = $comment;

        return $ticketComment->save();
    }

    public function getAttachedFiles() {
        return $this->hasOne(TicketFileModel::class,'idTicket', 'idTicket')->get();
    }

    public function attachFile(int $employeeId, string $path, string $extension) {
        $ticketFile = new TicketFileModel();
        $ticketFile->idTicket = $this->idTicket;
        $ticketFile->idEmployee = $employeeId;
        $ticketFile->filename = basename($path);
        $ticketFile->extension = $extension;
        $ticketFile->path = $path;

        return $ticketFile->save();
    }

    public function addHistoryEvent(int $employeeId, int $historyType) {
        $ticketHistory = new TicketHistoryModel();
        $ticketHistory->idTicket = $this->idTicket;
        $ticketHistory->idTicketHistoryType = $historyType;
        $ticketHistory->idEmployee = $employeeId;

        return $ticketHistory->save();
    }

    public function getHistory() {
        return $this->hasOne(TicketHistoryModel::class, 'idTicket', 'idTicket')
            ->orderByDesc('created_at')
            ->orderByDesc('idTicketHistory')
            ->get();
    }

    public function changeStatus($status) {
        $this->idTicketStatus = $status;

        return $this->save();
    }

    public function closeTicket() {
        $this->idTicketStatus = ListTicketStatusConstants::CLOSED;

        return $this->save();
    }

}
