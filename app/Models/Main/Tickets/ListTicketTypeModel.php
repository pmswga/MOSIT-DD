<?php

namespace App\Models\Service\Lists;

use Illuminate\Database\Eloquent\Model;

class ListTicketTypeModel extends Model
{
    protected $table = 'list_ticket_type';
    protected $primaryKey = 'idTicketType';
    public $timestamps = false;
}
