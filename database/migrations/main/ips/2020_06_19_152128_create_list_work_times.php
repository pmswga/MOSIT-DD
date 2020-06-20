<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListWorkTimes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(\App\Core\Config\ListDatabaseTable::TABLE_LIST_WORK_TIMES, function (Blueprint $table) {
            $table->bigIncrements('idWorkTime');
            $table->float('rateValue');
            $table->float('staff');
            $table->float('other');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(\App\Core\Config\ListDatabaseTable::TABLE_LIST_WORK_TIMES);
    }
}
