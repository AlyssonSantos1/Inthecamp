<?php

namespace App\Providers;
use Illuminate\Support\Facades\Gate;
use App\Models\Owner;


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
        Gate::define('inventory', fn(Owner $owner) => strtolower($owner->function) === 'inventory');
        Gate::define('sommelier', fn(Owner $owner) => strtolower($owner->function) === 'sommelier');
        Gate::define('attendant', fn(Owner $owner) => strtolower($owner->function) === 'attendant');

    }
}
