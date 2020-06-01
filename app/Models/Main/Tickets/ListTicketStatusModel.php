<?php

namespace App\Models\Service\Lists;

use Illuminate\Database\Eloquent\Model;

class ListTicketStatusModel extends Model
{
    protected $table = 'list_ticket_status';
    protected $primaryKey = 'idTicketStatus';
    public $timestamps = false;

    public function getCaption() {
        return $this->caption;
    }

}
