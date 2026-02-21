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
        $this->app->singleton(GoogleMapsService::class, function () {
            $apiKey = config('services.google_maps.key');

            if (empty($apiKey)) {
                throw new \RuntimeException('Google Maps API key is not configured.');
            }

            return new GoogleMapsService(apiKey: $apiKey);
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
