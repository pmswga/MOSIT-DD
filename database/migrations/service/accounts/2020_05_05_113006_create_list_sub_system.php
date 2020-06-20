<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListSubSystem extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(\App\Core\Config\ListDatabaseTable::TABLE_LIST_SUB_SYSTEM, function (Blueprint $table) {
            $table->bigIncrements('idSubSystem');
            $table->unsignedBigInteger('idSystemSection')->index();
            $table->string('caption')->unique();
            $table->string('route');
            $table->foreign('idSystemSection')->references('idSystemSection')->on(\App\Core\Config\ListDatabaseTable::TABLE_LIST_SYSTEM_SECTION)
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
        Schema::dropIfExists(\App\Core\Config\ListDatabaseTable::TABLE_LIST_SUB_SYSTEM);
    }
}
