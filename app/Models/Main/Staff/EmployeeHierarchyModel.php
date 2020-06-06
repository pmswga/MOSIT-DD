<?php

namespace App\Models\Main\Staff;

use App\Core\Config\ListDatabaseTable;
use Illuminate\Database\Eloquent\Model;

class EmployeeHierarchyModel extends Model
{
    protected $table = ListDatabaseTable::TABLE_EMPLOYEE_HIERARCHY;
    protected $primaryKey = 'idEmployeeHierarchy';


}
