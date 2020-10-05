<?php

namespace App\Models\Service\Accounts;

use App\Core\Config\ListDatabaseTable;
use App\Models\Service\Lists\ListSubSystemModel;
use Illuminate\Database\Eloquent\Model;


/**
 * @class AccountRightsModel
 * @brief
 *
 * @package App\Models\Serivce\Accounts;
 */
class AccountRightsModel extends Model
{
    protected $table = ListDatabaseTable::TABLE_ACCOUNT_RIGHTS; ///< Соответствующая таблица в базе данных
    protected $primaryKey = 'idAccountRight'; ///< Первичный ключ
    public $timestamps = false;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->isAccess = false;
        $this->isViewAny = false;
        $this->isCreate = false;
        $this->isUpdate = false;
        $this->isDelete = false;
    }

    /**
     * Возвращает информацию о подсистеме
     * @return ListSubSystemModel
     */
    public function getSubSystem() {
        return $this->hasOne(ListSubSystemModel::class, 'idSubSystem', 'idSubSystem')->first();
    }

    /**
     * Возвращает флаг - имеется ли доступ?
     * @return bool
     */
    public function isAccess() {
        return $this->isAccess;
    }

    /**
     * Возвращает флаг - может ли просматривать все записи?
     * @return bool
     */
    public function isViewAny() {
        return $this->isViewAny;
    }

    /**
     * Возвращает флаг - может ли просматривать одну запись?
     * @return bool
     */
    public function isView() {
        return $this->isView;
    }

    /**
     * Возвращает флаг - может ли создавать что-то в подсистеме?
     * @return bool
     */
    public function isCreate() {
        return $this->isCreate;
    }

    /**
     * Возвращает флаг - может ли обновлять записи в подсистеме?
     * @return bool
     */
    public function isUpdate() {
        return $this->isUpdate;
    }

    /**
     * Возвращает флаг - может ли удалять записи в подсистеме?
     * @return bool
     */
    public function isDelete() {
        return $this->isDelete;
    }

    /**
     * Возвращает флаг - имеет ли полный доступ к системе?
     * @return bool
     */
    public function isFullAccess() {
        return $this->isAccess &&
            $this->isViewAny &&
            $this->isView &&
            $this->isCreate &&
            $this->isUpdate &&
            $this->isDelete;
    }

}
