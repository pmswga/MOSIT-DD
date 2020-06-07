<?php

namespace App\Models\Service\Lists;

use App\Core\Config\ListDatabaseTable;
use Illuminate\Database\Eloquent\Model;

class ListTicketHistoryTypeModel extends Model
{
    protected $table = ListDatabaseTable::TABLE_LIST_TICKET_HISTORY_TYPE;
    protected $primaryKey = 'idTicketHistoryType';
    public $timestamps = false;

    public function getCaption() {
        return $this->caption;
    }

    public function getMessage() {
        return $this->message;
    }

}
