<?php

namespace App\Models\Main\Storage;

use App\Core\Config\ListDatabaseTable;
use Illuminate\Database\Eloquent\Model;

class ListFileTagModel extends Model
{
    protected $table = ListDatabaseTable::TABLE_LIST_FILE_TAG;
    protected $primaryKey = 'idFileTag';

    public function getCaption() {
        return $this->caption;
    }

}
