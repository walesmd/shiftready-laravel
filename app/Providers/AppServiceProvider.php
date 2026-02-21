<?php

namespace App\Providers;

use App\Services\GoogleMapsService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(GoogleMapsService::class, fn () => new GoogleMapsService(
            apiKey: config('services.google_maps.key') ?? '',
        ));
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
