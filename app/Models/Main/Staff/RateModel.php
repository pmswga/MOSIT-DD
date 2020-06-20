<?php

namespace App\Models\Main\Staff;

use App\Core\Config\ListDatabaseTable;
use Illuminate\Database\Eloquent\Model;

class RateModel extends Model
{
    protected $table = ListDatabaseTable::TABLE_RATES;
    protected $primaryKey = 'idRate';
    public $timestamps = false;

    public function getEmployee() {
        return $this->hasOne(EmployeeModel::class, 'idEmployee', 'idEmployee')->first();
    }

    public function getRateType() {
        return $this->hasOne(ListRateTypeModel::class, 'idRateType', 'idRateType')->first();
    }

    public function getRateValue() {
        return $this->rateValue;
    }

}
