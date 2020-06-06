<?php

namespace App\Models\Service\Lists;

use App\Core\Config\ListDatabaseTable;
use Illuminate\Database\Eloquent\Model;

class ListTicketStatusModel extends Model
{
    protected $table = ListDatabaseTable::TABLE_LIST_TICKET_STATUS;
    protected $primaryKey = 'idTicketStatus';
    public $timestamps = false;

    public function getCaption() {
        return $this->caption;
    }

}
