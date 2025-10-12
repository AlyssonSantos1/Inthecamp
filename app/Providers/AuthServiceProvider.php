<?php

namespace App\Providers;
use Illuminate\Support\Facades\Gate;


// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('inventory', fn($user) => $user->hierarchy === 'inventory');
        Gate::define('sommelier', fn($user) => $user->hierarchy === 'sommelier');
        Gate::define('attendant', fn($user) => $user->hierarchy === 'attendant');
    }
}
