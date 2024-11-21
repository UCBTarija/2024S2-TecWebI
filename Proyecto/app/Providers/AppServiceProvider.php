<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use App\Core\Application\RbacService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {        
        Gate::define('producto-create', function (User $user) {
            return $user->hasPermission('producto-create');
        });

        Gate::define('producto-update', function (User $user) {
            return $user->hasPermission('producto-update');
        });

        Gate::define('producto-delete', function (User $user) {
            return $user->hasPermission('producto-delete');
        });
    }
}
