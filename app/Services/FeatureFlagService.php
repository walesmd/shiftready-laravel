<?php

namespace App\Services;

use App\Models\FeatureFlag;
use Illuminate\Support\Facades\Cache;

class FeatureFlagService
{
    private const string CACHE_KEY = 'feature_flags';

    public function isEnabled(string $name): bool
    {
        $flags = Cache::rememberForever(self::CACHE_KEY, function () {
            return FeatureFlag::query()
                ->pluck('is_enabled', 'name')
                ->all();
        });

        return (bool) ($flags[$name] ?? false);
    }

    public function flush(): void
    {
        Cache::forget(self::CACHE_KEY);
    }
}
