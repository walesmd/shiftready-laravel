<?php

namespace App\Providers;

use App\Services\FeatureFlagService;
use App\Services\GoogleMapsService;
use Illuminate\Support\Facades\Blade;
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

        $this->app->singleton(FeatureFlagService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Blade::directive('feature', fn ($expr) => "<?php if ({$expr}->isEnabled()): ?>");
        Blade::directive('endfeature', fn () => '<?php endif; ?>');
    }
}
