<?php

namespace App\Models\Main\IP;

use App\Core\Config\ListDatabaseTable;
use Illuminate\Database\Eloquent\Model;

class ListWorks extends Model
{
    protected $table = ListDatabaseTable::TABLE_LIST_WORKS;
    protected $primaryKey = 'idWork';
    public $timestamps = false;

    public function getWorkType() {
        return $this->hasOne(ListWorkType::class, 'idWorkType', 'idWorkType')->first() ?? new ListWorkType();
    }

    public function getWorkCaption() {
        return $this->workCaption;
    }

    public function getSubCaption() {
        return $this->subCaption;
    }

    public function getMaxHours() {
        return $this->maxHours;
    }

}
