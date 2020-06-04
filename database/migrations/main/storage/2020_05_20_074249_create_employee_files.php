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
            $table->unsignedBigInteger('idEmployee');
            $table->unsignedBigInteger('idFileTag');
            $table->string('path', 255);
            $table->string('directory', 255);
            $table->string('filename', 255);
            $table->string('extension', 10);
            $table->timestamps();
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
