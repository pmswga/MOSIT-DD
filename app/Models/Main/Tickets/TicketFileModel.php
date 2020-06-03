<?php

namespace App\Models\Main\Tickets;

use Illuminate\Database\Eloquent\Model;

class TicketFileModel extends Model
{
    protected $table = 'ticket_file';
    protected $primaryKey = 'idTicketFile';

    public function getPath() {
        return $this->path;
    }

}
