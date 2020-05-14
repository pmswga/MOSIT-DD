<?php

namespace App\Models\Main\IP;

use App\Models\Main\Employees\Employee;
use App\Models\Main\Employees\Teacher;
use Illuminate\Database\Eloquent\Model;

class IP extends Model
{
    protected $table = 'ips';
    protected $primaryKey = 'idIP';
    public $timestamps = false;

    public function getTeacherInitials() {
        $teacher = $this->hasOne(Teacher::class, 'idTeacher', 'idTeacher')
                ->where('idTeacher', '=', $this->idTeacher)->get()->first();

        if ($teacher) {
            $employee = $teacher->hasOne(Employee::class, 'idEmployee', 'idEmployee')->get()->first();

            if ($employee) {
                return $employee->getFullInitials();
            }
        }

        return '';
    }

}
