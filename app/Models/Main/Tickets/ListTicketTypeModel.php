<?php

namespace App\Models\Service\Lists;

use App\Core\Config\ListDatabaseTable;
use Illuminate\Database\Eloquent\Model;

class ListTicketTypeModel extends Model
{
    protected $table = ListDatabaseTable::TABLE_LIST_TICKET_TYPE;
    protected $primaryKey = 'idTicketType';
    public $timestamps = false;
}
