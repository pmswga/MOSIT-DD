<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeachers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TeachersSeeder', function (Blueprint $table) {
            $table->bigIncrements('idTeacher');
            $table->integer('idEmployee');
            $table->integer('idDegree');
            $table->integer('idAcademicTitle');
            $table->integer('idScienceType');
            $table->integer('idTeacherPost');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('TeachersSeeder');
    }
}
