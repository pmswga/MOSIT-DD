<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountRights extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(\App\Core\Config\ListDatabaseTable::TABLE_ACCOUNT_RIGHTS, function (Blueprint $table) {
            $table->unsignedBigInteger('idAccount')->index();
            $table->unsignedBigInteger('idSubSystem')->index();
            $table->boolean('isAccess')->default(0);
            $table->boolean('isViewAny')->default(0);
            $table->boolean('isView')->default(0);
            $table->boolean('isCreate')->default(0);
            $table->boolean('isUpdate')->default(0);
            $table->boolean('isDelete')->default(0);
            $table->foreign('idAccount')->references('idAccount')->on(\App\Core\Config\ListDatabaseTable::TABLE_ACCOUNTS)
                ->onUpdate('cascade')
                ->onDelete('cascade');
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
        Schema::dropIfExists(\App\Core\Config\ListDatabaseTable::TABLE_ACCOUNT_RIGHTS);
    }
}
