<?php

namespace App\Providers;

use App\User;
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

        Gate::define('useAdminPanel', function (User $user) {
            return $user->isAdmin();
        });

        Gate::define('updateContent', function (User $user) {
            return $user->isModerator();
        });

        Gate::define('useAdminPanel', function (User $user) {
            return $user->isAdmin();
        });
    }
}
