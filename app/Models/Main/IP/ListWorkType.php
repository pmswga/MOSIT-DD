<?php

namespace App\Models\Main\IP;

use App\Core\Config\ListDatabaseTable;
use Illuminate\Database\Eloquent\Model;

/**
 * @class ListWorkType
 * @brief Модель вида работ
 *
 * @package App\Models\Main\IP
 */
class ListWorkType extends Model
{
    protected $table = ListDatabaseTable::TABLE_LIST_WORK_TYPE; ///< Соответствующая таблица в базе данных
    protected $primaryKey = 'idWorkType'; ///< Первичный ключ
    public $timestamps = false; ///< Временные метки

    /**
     * Возвращает наименование работы
     * @return string
     */
    public function getCaption() {
        return $this->caption;
    }

}
