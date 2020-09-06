<?php

namespace App\Models\Main\IP;

use App\Core\Config\ListDatabaseTable;
use Illuminate\Database\Eloquent\Model;

/**
 * @class ListWorksModel
 * @brief Модель работы
 *
 *
 * @package App\Models\Main\IP
 */
class ListWorksModel extends Model
{
    protected $table = ListDatabaseTable::TABLE_LIST_WORKS; ///< Соответствущая таблица в базе данных
    protected $primaryKey = 'idWork'; ///< Первичный ключ
    public $timestamps = false; ///< Временные метки

    /**
     * @return ListWorkType
     */
    public function getWorkType() {
        return $this->hasOne(ListWorkType::class, 'idWorkType', 'idWorkType')->first() ?? new ListWorkType();
    }

    /**
     * Возвращает основное описание
     * @return string
     */
    public function getWorkCaption() {
        return $this->workCaption;
    }

    /**
     * Возвращает дополнительное описание
     * @return string
     */
    public function getSubCaption() {
        return $this->subCaption;
    }

    /**
     * Возвращает максимальное кол-во часов для работы
     * @return string
     */
    public function getMaxHours() {
        return $this->maxHours;
    }

}
