<?php

namespace App\Providers;

use App\Models\LegalAspek;
use App\Policies\LegalAspekPolicy;
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
        Gate::policy(LegalAspek::class, LegalAspekPolicy::class);
    }
}
