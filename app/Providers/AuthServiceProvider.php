<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
//use Illuminate\Auth\Access\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Models\User;


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
        Paginator::defaultView('pagination::default');

        Gate::define('edit-user', function (User $user) {
            return $user->isadmin;
        });

        Gate::define('destroy-user', function (User $user) {
            return $user->isadmin;
        });
    }
}
