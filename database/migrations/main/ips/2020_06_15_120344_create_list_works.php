<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListWorks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(\App\Core\Config\ListDatabaseTable::TABLE_LIST_WORKS, function (Blueprint $table) {
            $table->bigIncrements('idWork');
            $table->unsignedBigInteger('idWorkType')->index();
            $table->string('workCaption');
            $table->string('subCaption')->nullable();
            $table->string('comment')->nullable();
            $table->decimal('maxHours');
            $table->foreign('idWorkType')->references('idWorkType')->on(\App\Core\Config\ListDatabaseTable::TABLE_LIST_WORK_TYPE)
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
        Schema::dropIfExists(\App\Core\Config\ListDatabaseTable::TABLE_LIST_WORKS);
    }
}
