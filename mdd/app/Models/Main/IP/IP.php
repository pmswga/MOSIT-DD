<?php

namespace App\Models\Main\IP;

use App\Models\Main\Employees\EmployeeModel;
use App\Models\Main\Employees\Teacher;
use App\Models\Main\Storage\EmployeeFileModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class IP extends Model
{
    protected $table = 'ips';
    protected $primaryKey = 'idIP';
    public $timestamps = false;

    public function getFileContent() {
        $file = $this->hasOne(EmployeeFileModel::class, 'idEmployeeFile', 'idEmployeeFile')->first();
        return Storage::get( $file->path);
    }

    public function getTeacherInitials() {
        $teacher = $this->hasOne(Teacher::class, 'idTeacher', 'idTeacher')
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
