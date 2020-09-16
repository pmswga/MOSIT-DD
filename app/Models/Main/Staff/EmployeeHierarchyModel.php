<?php

namespace App\Models\Main\Staff;

use App\Core\Config\ListDatabaseTable;
use Egulias\EmailValidator\EmailLexer;
use Illuminate\Database\Eloquent\Model;
/**
 * @class EmployeeHierarchyModel
 * @brief Модель иерархии сотрудников
 *
 * @package App\Models\Main\Staff
 */
class EmployeeHierarchyModel extends Model
{
    protected $table = ListDatabaseTable::TABLE_EMPLOYEE_HIERARCHY; ///< Соответствующая таблица в базе данных
    protected $primaryKey = 'idEmployeeHierarchy'; ///< Первичный ключ

    /**
     * Возвращает подчинённого сотрудника
     * @return EmployeeModel
     */
    public function getEmployeeSup() {
        return $this->hasOne(EmployeeModel::class, 'idEmployee', 'idEmployeeSup')->first();
    }

    /**
     * Возвращает начальника
     * @return EmployeeModel
     */
    public function getEmployeeSub() {
        return $this->hasOne(EmployeeModel::class, 'idEmployee', 'idEmployeeSub')->first();
    }

}
