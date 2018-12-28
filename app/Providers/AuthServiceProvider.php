<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

use Gate;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    public function boot()
    {
        Gate::define('viewWebSocketsDashboard', function ($user = null) {
            return true;
        });

        $this->registerPolicies();
    }
}
