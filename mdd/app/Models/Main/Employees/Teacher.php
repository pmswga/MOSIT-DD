<?php

namespace App\Models\Main\Employees;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $table = 'Teachers';
    protected $primaryKey = 'idTeacher';
    public $timestamps = false;

}
