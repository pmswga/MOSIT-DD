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
        Schema::create(\App\Core\Config\ListDatabaseTable::TABLE_TEACHERS, function (Blueprint $table) {
            $table->bigIncrements('idTeacher');
            $table->unsignedBigInteger('idDegree')->nullable()->index();
            $table->unsignedBigInteger('idAcademicTitle')->nullable()->index();
            $table->unsignedBigInteger('idScienceType')->nullable()->index();
            $table->unsignedBigInteger('idTeacherPost')->index();
            $table->foreign('idTeacher')->references('idEmployee')->on(\App\Core\Config\ListDatabaseTable::TABLE_EMPLOYEES)
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('idDegree')->references('idDegree')->on(\App\Core\Config\ListDatabaseTable::TABLE_LIST_DEGREE)
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('idAcademicTitle')->references('idAcademicTitle')->on(\App\Core\Config\ListDatabaseTable::TABLE_LIST_ACADEMIC_TITLE)
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('idScienceType')->references('idScienceType')->on(\App\Core\Config\ListDatabaseTable::TABLE_LIST_SCIENCE_TYPE)
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('idTeacherPost')->references('idTeacherPost')->on(\App\Core\Config\ListDatabaseTable::TABLE_LIST_TEACHER_POST)
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(\App\Core\Config\ListDatabaseTable::TABLE_TEACHERS);
    }
}
