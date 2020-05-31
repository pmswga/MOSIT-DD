<?php

namespace App\Models\Main\IP;

use App\Models\Main\Staff\EmployeeModel;
use App\Models\Main\Staff\TeacherModel;
use App\Models\Main\Storage\EmployeeFileModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class IPModel extends Model
{
    protected $table = 'ips';
    protected $primaryKey = 'idIP';
    public $timestamps = false;

    public function getFilePath() {
        $file = $this->hasOne(EmployeeFileModel::class, 'idEmployeeFile', 'idEmployeeFile')->first();
        return $file->path;
    }

    public function getFullFilePath() {
        return str_replace('/', '\\' , storage_path() . '/app/' . $this->getFilePath());
    }

    public function getFileContent() {
        $file = $this->hasOne(EmployeeFileModel::class, 'idEmployeeFile', 'idEmployeeFile')->first();
        return Storage::get($file->path);
    }

    public function getTeacherInitials() {
        $teacher = $this->hasOne(TeacherModel::class, 'idTeacher', 'idTeacher')
                ->where('idTeacher', '=', $this->idTeacher)->get()->first();

        if ($teacher) {
            $employee = $teacher->hasOne(EmployeeModel::class, 'idEmployee', 'idEmployee')->get()->first();

            if ($employee) {
                return $employee->getFullInitials();
            }
        }

        return '';
    }

}
