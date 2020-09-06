<?php

namespace App\Models\Main\Storage;

use App\Core\Config\ListDatabaseTable;
use App\Models\Main\Storage\ListFileTagModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

/**
 * @class EmployeeFileModel
 * @brief Модель файла сотрудника
 *
 * @package App\Models\Main\Storage
 */
class EmployeeFileModel extends Model
{
    protected $table = ListDatabaseTable::TABLE_EMPLOYEE_FILES; ///< Соответствующая таблица в базе данных
    protected $primaryKey = 'idEmployeeFile'; ///< Первичный ключ
    protected $date_format = 'd.m.Y / H:i'; ///< Формат даты

    protected $fillable = [
        'idEmployee', 'idFileTag',  'path', 'directory', 'filename', 'extension'
    ]; ///< Заполняемые поля при добавлении новой записи в таблицу


    /**
     * Возвращает директорю, в которой расположен файл
     * @return string
     */
    public function getDirectory() {
        return $this->directory;
    }

    /**
     * Возвращает путь к файлу
     * @return string
     */
    public function getPath() {
        return $this->path;
    }

    /**
     * Возвращает нормализированный путь
     * @return string
     */
    public function getNormalizePath() {
        $fullPath =
            storage_path() .
            DIRECTORY_SEPARATOR .
            'app' .
            DIRECTORY_SEPARATOR .
            $this->directory .
            DIRECTORY_SEPARATOR .
            $this->filename;

        if (PHP_OS === 'WINNT') {
            $fullPath = str_replace('/', '\\', $fullPath);
        }

        return $fullPath;
    }

    /**
     * Возвращает имя файла
     * @param bool $withExtension - флаг расширения. TRUE - с расширением, FALSE - без расширения
     * @return string
     */
    public function getFilename(bool $withExtension = false) {
        if ($withExtension) {
            return $this->filename;
        }

        return pathinfo($this->filename, PATHINFO_FILENAME);
    }

    /**
     * Возвращает размер файла
     * @return float|int
     */
    public function getSize() {
        if (Storage::exists($this->path)) {
            return round((Storage::size($this->path)/1024)/1024, 2);
        }

        return 0;
    }

    /**
     * Возвращает расширение файла
     * @return string
     */
    public function getExtension() {
        return $this->extension;
    }

    /**
     * Возвращает метку файла
     * @return ListFileTagModel
     */
    public function getFileTag() {
        return $this->hasOne(ListFileTagModel::class,'idFileTag', 'idFileTag')->first();
    }

    /**
     * Метод используется для проверка наличия файла в корзине
     * @return bool
     */
    public function InTrash() {
        return $this->inTrash;
    }

    /**
     * Возвращет дату загрузки файла
     * @return string
     */
    public function getCreatedDate() {
        return $this->created_at->format($this->date_format);
    }

    /**
     * Возвращает дату изменения файла
     * @return string
     */
    public function getUpdatedDate() {
        return $this->updated_at->format($this->date_format);
    }

    /**
     * Перемещает файл в корзину
     * @return bool
     */
    public function moveToTrash() {
        $this->inTrash = true;
        return $this->update();
    }

    /**
     * Восстанавливает файл из корзины
     * @return bool
     */
    public function restoreFromTrash() {
        $this->inTrash = false;
        return $this->update();
    }

}
