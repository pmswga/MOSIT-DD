<?php

namespace App\Models\Main\IP;

use App\Core\Config\ListDatabaseTable;
use Illuminate\Database\Eloquent\Model;

class ListWorkTimesModel extends Model
{
    protected $table = ListDatabaseTable::TABLE_LIST_WORK_TIMES;
    protected $primaryKey = 'idWorkTime';
    public $timestamps = false;

    public function getRateValue() {
        return $this->rateValue;
    }

    public function getStaff() {
        return $this->staff;
    }

    public function getOther() {
        return $this->other;
    }

}
