<?php

namespace App\Models\Main\Storage;

use App\Core\Config\ListDatabaseTable;
use Illuminate\Database\Eloquent\Model;

/**
 * @class ListFileTagModel
 * @brief Модель метки файла
 *
 * @package App\Models\Main\Storage
 */
class ListFileTagModel extends Model
{
    protected $table = ListDatabaseTable::TABLE_LIST_FILE_TAG; ///< Связанная таблица в базе данных
    protected $primaryKey = 'idFileTag'; ///< Первичный ключ

    /**
     * Возвращает наименование метки
     * @return string
     */
    public function getCaption() {
        return $this->caption;
    }

}
