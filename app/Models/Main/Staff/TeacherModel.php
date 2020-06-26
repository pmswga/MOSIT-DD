<?php

namespace App\Models\Main\Staff;

use App\Core\Config\ListDatabaseTable;
use App\Models\Main\IP\IPModel;
use Illuminate\Database\Eloquent\Model;

class TeacherModel extends Model
{
    protected $table = ListDatabaseTable::TABLE_TEACHERS;
    protected $primaryKey = 'idTeacher';
    public $timestamps = false;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->isNull = true;
    }

    public function getPost() {
        return $this->hasOne(ListTeacherPostModel::class, 'idTeacherPost', 'idTeacherPost')->first();
    }

    public function getIPS() {
        return $this->hasMany(IPModel::class,'idTeacher', 'idTeacher')->get();
    }

}
