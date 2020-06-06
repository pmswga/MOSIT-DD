<?php

namespace App\Models\Service\Lists;

use App\Core\Config\ListDatabaseTable;
use App\Models\Service\Accounts\ListSystemSectionModel;
use Illuminate\Database\Eloquent\Model;

class ListSubSystemModel extends Model
{
    protected  $table = ListDatabaseTable::TABLE_LIST_SUB_SYSTEM;
    protected $primaryKey = 'idListSubSystem';
    public $timestamps = false;

    public function getSystemSection() {
        return $this->hasOne(ListSystemSectionModel::class, 'idSystemSection', 'idSystemSection')->first();
    }

    public function getCaption() {
        return $this->caption;
    }

    public function getRoute() {
        return $this->route;
    }

}
