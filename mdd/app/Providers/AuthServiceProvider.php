<?php

namespace App\Providers;

use App\Models\Main\IP\IP;
use App\Models\Main\Storage\EmployeeFileModel;
use App\Policies\IPPolicy;
use App\Policies\main\storage\EmployeeFilePolicy;
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
        IP::class => IPPolicy::class,
        EmployeeFileModel::class => EmployeeFilePolicy::class
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
