<?php

namespace App\Models\Main\Staff;

use App\Models\Main\IP\IPModel;
use Illuminate\Database\Eloquent\Model;

class TeacherModel extends Model
{
    protected $table = 'Teachers';
    protected $primaryKey = 'idTeacher';
    public $timestamps = false;

    public function getIPS() {
        $ips = $this->hasOne(IPModel::class,'idTeacher', 'idTeacher')->get();

        if ($ips) {
            return $ips;
        }

        return null;
    }

}
