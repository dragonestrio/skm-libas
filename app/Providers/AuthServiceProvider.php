<?php

namespace App\Providers;

use App\Models\Users;
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
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // Gate

        Gate::define('superadmin', function () {
            $result = auth()->user()->level === 'superadmin';
            return $result;
        });
        Gate::define('admin', function () {
            $result = auth()->user()->level === 'admin';
            return $result;
        });
        Gate::define('user', function () {
            $result = auth()->user()->level === 'user';
            return $result;
        });
        Gate::define('owner', function () {
            $result = auth()->user()->level === 'owner';
            return $result;
        });
        Gate::define('karyawan', function () {
            $result = auth()->user()->level === 'karyawan';
            return $result;
        });
        Gate::define('auth', function () {
            $result = auth()->check() === true;
            return $result;
        });

        // 
    }
}
