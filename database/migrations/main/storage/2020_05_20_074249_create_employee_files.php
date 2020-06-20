<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeFiles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(\App\Core\Config\ListDatabaseTable::TABLE_EMPLOYEE_FILES, function (Blueprint $table) {
            $table->bigIncrements('idEmployeeFile');
            $table->unsignedBigInteger('idEmployee')->index();
            $table->unsignedBigInteger('idFileTag')->index();
            $table->string('path');
            $table->string('directory');
            $table->string('filename');
            $table->string('extension');
            $table->boolean('inTrash')->default(false);
            $table->timestamps();
            $table->foreign('idEmployee')->references('idEmployee')->on(\App\Core\Config\ListDatabaseTable::TABLE_EMPLOYEES)
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('idFileTag')->references('idFileTag')->on(\App\Core\Config\ListDatabaseTable::TABLE_LIST_FILE_TAG)
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
        Schema::dropIfExists(\App\Core\Config\ListDatabaseTable::TABLE_EMPLOYEE_FILES);
    }
}
