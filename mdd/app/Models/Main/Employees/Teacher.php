<?php

namespace App\Models\Main\Employees;

use App\Models\Main\IP\IP;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $table = 'Teachers';
    protected $primaryKey = 'idTeacher';
    public $timestamps = false;

    public function getIPS() {
        $ips = $this->hasOne(IP::class,'idTeacher', 'idTeacher')->get();

        if ($ips) {
            return $ips;
        }

        return null;
    }

}
