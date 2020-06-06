<?php

namespace App\Models\Main\IP;

use App\Core\Config\ListDatabaseTable;
use App\Models\Main\Staff\EmployeeModel;
use App\Models\Main\Staff\TeacherModel;
use App\Models\Main\Storage\EmployeeFileModel;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class IPModel extends Model
{
    protected $table = ListDatabaseTable::TABLE_IPS;
    protected $primaryKey = 'idIP';
    public $timestamps = false;
    protected $date_format = 'd.m.Y / H:i';

    public function getFilePath() {
        $file = $this->hasOne(EmployeeFileModel::class, 'idEmployeeFile', 'idEmployeeFile')->first();
        return $file->path;
    }

    public function getFullFilePath() {
        return storage_path() . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . $this->getFilePath();
    }

    public function getFIle() {
        return $this->hasOne(EmployeeFileModel::class, 'idEmployeeFile', 'idEmployeeFile')->first();
    }

    public function getTeacher() {
        return $this->hasOne(EmployeeModel::class,'idEmployee', 'idTeacher')->first();
    }

    public function getLastEmployee() {
        return $this->hasOne(EmployeeModel::class, 'idEmployee', 'lastEmployee')->first();
    }

    public function getLastUpdate() {
        return Carbon::createFromTimeString($this->lastUpdate)->format($this->date_format);
    }

}
