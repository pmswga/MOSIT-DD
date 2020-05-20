<?php

namespace App\Models\Main\Storage;

use App\Models\Service\Lists\ListFileTagModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class EmployeeFileModel extends Model
{
    protected $table = 'employee_files';
    protected $primaryKey = 'idEmployeeFile';

    protected $fillable = [
        'idEmployee',  'path', 'directory', 'filename', 'extension'
    ];

    public function getFilename() {
        return $this->filename;
    }

    public function getSize() {
        return round((Storage::size($this->path)/1024)/1024, 2);
    }

    public function getExtension() {
        return $this->extension;
    }

    public function getPath() {
        return $this->path;
    }

    public function getCreatedDate() {
        return $this->created_at;
    }

    public function getUpdatedDate() {
        return $this->updated_at;
    }

}
