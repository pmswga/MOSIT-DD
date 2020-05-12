<?php

namespace App\Providers;

use App\Models\Main\IP\IP;
use App\Policies\IPPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        IP::class => IPPolicy::class
    ];

    /**
     * Register any authentication / authorization Service.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
