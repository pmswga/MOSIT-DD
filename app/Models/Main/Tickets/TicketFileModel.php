<?php

namespace App\Models\Main\Tickets;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class TicketFileModel extends Model
{
    protected $table = 'ticket_files';
    protected $primaryKey = 'idTicketFile';
    protected $date_format;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->date_format = 'd.m.Y / H:i';
    }

    public function getPath() {
        return $this->path;
    }

    public function getExtension() {
        return $this->extension;
    }

    public function getSize() {
        if (Storage::exists($this->path)) {
            return round(((Storage::size($this->path) / 1024) / 1024), 2);
        }

        return 0;
    }

    public function getCreatedDate() {
        return $this->created_at->format($this->date_format);
    }

    public function getUpdatedDate() {
        return $this->updated_at->format($this->date_format);
    }

}
