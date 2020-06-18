<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Main\Staff\EmployeeModel;
use Faker\Generator as Faker;

$factory->define(EmployeeModel::class, function (Faker $faker) {
    return [

        'idEmployee' => 1,
        'secondName' => 'Михайлова',
        'firstName' => 'Евгения',
        'patronymic' => 'Константиновна',
        'personalPhone' => '+79036233166',
        'personalEmail' => 'michaylova1996@mail.ru',
        'idFaculty' => 1,
        'idEmployeePost' => 2,
        'updated_at' => now(),
        'created_at' => now()
    ];
});
