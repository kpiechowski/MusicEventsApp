<?php

namespace App\Providers;

use App\Models\Artist;
use App\Models\User;
use App\Policies\ArtistPolicy;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Gate;
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
        //

        Gate::policy(Artist::class, ArtistPolicy::class);

        Gate::define('admin-action', function (User $user) {
            return $user->is_admin
                ? Response::allow()
                // : Response::denyAsNotFound();
                // : Response::denyWithStatus();
                : Response::deny('You need admin authorization to proceed');
        });
    }
}
