<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application Service.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application Service.
     *
     * @return void
     */
    public function boot()
    {
        Schema::enableForeignKeyConstraints();
    }
}
