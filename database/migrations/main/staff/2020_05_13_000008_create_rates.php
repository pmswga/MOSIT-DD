<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRates extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(\App\Core\Config\ListDatabaseTable::TABLE_RATES, function (Blueprint $table) {
            $table->bigIncrements('idRate');
            $table->unsignedBigInteger('idEmployee');
            $table->unsignedBigInteger('idRateType');
            $table->float('rateValue');
            $table->foreign('idEmployee')->references('idEmployee')->on(\App\Core\Config\ListDatabaseTable::TABLE_EMPLOYEES)
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('idRateType')->references('idRateType')->on(\App\Core\Config\ListDatabaseTable::TABLE_LIST_RATE_TYPE)
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
        Schema::dropIfExists(\App\Core\Config\ListDatabaseTable::TABLE_RATES);
    }
}
