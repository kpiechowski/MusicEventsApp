<?php

namespace App\Providers;

use App\Models\Artist;
use App\Policies\ArtistPolicy;
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
    }
}
