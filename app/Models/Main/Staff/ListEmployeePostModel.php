<?php

namespace App\Models\Service\Lists;

use App\Core\Config\ListDatabaseTable;
use Illuminate\Database\Eloquent\Model;

class ListEmployeePostModel extends Model
{
    protected $table = ListDatabaseTable::TABLE_LIST_EMPLOYEE_POST;
    protected $primaryKey = 'idEmployeePost';
    public $timestamps = false;

    public function getCaption() {
        return $this->caption;
    }


}
