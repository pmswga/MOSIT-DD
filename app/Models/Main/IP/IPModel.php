<?php

namespace App\Models\Main\IP;

use App\Core\Config\ListDatabaseTable;
use App\Models\Main\Staff\EmployeeModel;
use App\Models\Main\Storage\EmployeeFileModel;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * @class IPModel
 * @brief Модель индвидуального плана
 *
 * @package App\Models\Main\IP
 */
class IPModel extends Model
{
    protected $table = ListDatabaseTable::TABLE_IPS; ///< Соответствующая таблица в базе данных
    protected $primaryKey = 'idIP'; ///< Первичный ключ
    public $timestamps = false; ///< Временные метки
    protected $date_format = 'd.m.Y / H:i'; ///< Формат даты

    /**
     * Возвращает EXCEL-файл индвидуального плана
     * @return EmployeeFileModel
     */
    public function getFile() {
        return $this->hasOne(EmployeeFileModel::class, 'idEmployeeFile', 'idEmployeeFile')->first();
    }

    /**
     * Возвращает информацию о преподавателе
     * @return EmployeeModel
     */
    public function getTeacher() {
        return $this->hasOne(EmployeeModel::class,'idEmployee', 'idTeacher')->first();
    }

    /**
     * Возвращает информацию о сотруднике, который в последний раз редактировал индвидуальный план
     * @return EmployeeModel
     */
    public function getLastEmployee() {
        return $this->hasOne(EmployeeModel::class, 'idEmployee', 'lastEmployee')->first();
    }

    /**
     * Возвращает дату последнего изменения
     * @return string
     */
    public function getLastUpdate() {
        return Carbon::createFromTimeString($this->lastUpdate)->format($this->date_format);
    }

}
