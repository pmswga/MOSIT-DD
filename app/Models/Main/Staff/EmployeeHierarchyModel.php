<?php

namespace App\Models\Main\Staff;

use App\Core\Config\ListDatabaseTable;
use Egulias\EmailValidator\EmailLexer;
use Illuminate\Database\Eloquent\Model;

class EmployeeHierarchyModel extends Model
{
    protected $table = ListDatabaseTable::TABLE_EMPLOYEE_HIERARCHY;
    protected $primaryKey = 'idEmployeeHierarchy';

    public function getEmployeeSup() {
        return $this->hasOne(EmployeeModel::class, 'idEmployee', 'idEmployeeSub')->first() ?? new EmployeeModel();
    }

    public function getEmployeeSub() {
        return $this->hasOne(EmployeeModel::class, 'idEmployee', 'idEmployeeSup')->first() ?? new EmployeeModel();
    }

}
