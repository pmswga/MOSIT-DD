<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListFileTag extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(\App\Core\Config\ListDatabaseTable::TABLE_LIST_FILE_TAG, function (Blueprint $table) {
            $table->bigIncrements('idFileTag');
            $table->unsignedBigInteger('idSubSystem')->index();
            $table->string('caption')->unique();
            $table->foreign('idSubSystem')->references('idSubSystem')->on(\App\Core\Config\ListDatabaseTable::TABLE_LIST_SUB_SYSTEM)
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
        Schema::dropIfExists(\App\Core\Config\ListDatabaseTable::TABLE_LIST_FILE_TAG);
    }
}
