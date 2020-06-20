<?php

namespace App\Models\Main\Storage;

use App\Core\Config\ListDatabaseTable;
use App\Models\Main\Storage\ListFileTagModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class EmployeeFileModel extends Model
{
    protected $table = ListDatabaseTable::TABLE_EMPLOYEE_FILES;
    protected $primaryKey = 'idEmployeeFile';
    protected $date_format = 'd.m.Y / H:i';

    protected $fillable = [
        'idEmployee', 'idFileTag',  'path', 'directory', 'filename', 'extension'
    ];

    public function getDirectory() {
        return $this->directory;
    }

    public function getPath() {
        return $this->path;
    }

    public function getNormalizePath() {
        $fullPath =
            storage_path() .
            DIRECTORY_SEPARATOR .
            'app' .
            DIRECTORY_SEPARATOR .
            $this->directory .
            DIRECTORY_SEPARATOR .
            $this->filename;

        if (PHP_OS === 'WINNT') {
            $fullPath = str_replace('/', '\\', $fullPath);
        }

        return $fullPath;
    }

    public function getFilename(bool $withExtension = false) {
        if ($withExtension) {
            return $this->filename;
        }

        return pathinfo($this->filename, PATHINFO_FILENAME);
    }

    public function getSize() {
        if (Storage::exists($this->path)) {
            return round((Storage::size($this->path)/1024)/1024, 2);
        }

        return 0;
    }

    public function getExtension() {
        return $this->extension;
    }

    public function getFileTag() {
        return $this->hasOne(ListFileTagModel::class,'idFileTag', 'idFileTag')->first();
    }

    public function InTrash() {
        return $this->inTrash;
    }

    public function getCreatedDate() {
        return $this->created_at->format($this->date_format);
    }

    public function getUpdatedDate() {
        return $this->updated_at->format($this->date_format);
    }

    public function moveToTrash() {
        $this->inTrash = true;
        return $this->update();
    }

    public function restoreFromTrash() {
        $this->inTrash = false;
        return $this->update();
    }

}
