<?php

namespace App\Models\Main\IP;

use App\Core\Config\ListDatabaseTable;
use Illuminate\Database\Eloquent\Model;


/**
 * @class ListWorkTimesModel
 * @brief Модель кол-ва часов работ в зависимости от ставки
 *
 * @package App\Models\Main\IP
 */
class ListWorkTimesModel extends Model
{
    protected $table = ListDatabaseTable::TABLE_LIST_WORK_TIMES; ///< Соответствующая таблица в базе данных
    protected $primaryKey = 'idWorkTime'; ///< Первичный ключ
    public $timestamps = false; ///< Временные метки

    /**
     * Возвращает значение ставки
     * @return float
     */
    public function getRateValue() {
        return $this->rateValue;
    }

    /**
     * Возвращает кол-во часов для штатного сотрудника
     * @return float
     */
    public function getStaff() {
        return $this->staff;
    }

    /**
     * Возвращает кол-во часов для нештатного сотрудника
     * @return float
     */
    public function getOther() {
        return $this->other;
    }

}
