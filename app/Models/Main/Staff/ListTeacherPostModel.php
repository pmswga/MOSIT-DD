<?php

namespace App\Models\Main\Staff;

use App\Core\Config\ListDatabaseTable;
use Illuminate\Database\Eloquent\Model;

class ListTeacherPostModel extends Model
{
    protected $table = ListDatabaseTable::TABLE_LIST_TEACHER_POST;
    protected $primaryKey = 'idTeacherPost';

    public function getCaption() {
        return $this->caption;
    }

}
