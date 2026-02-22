<?php

namespace App\Console\Commands\Feature;

use App\Enums\Feature;
use App\Services\FeatureFlagService;
use Illuminate\Console\Command;

class ListFeaturesCommand extends Command
{
    protected $signature = 'feature:list';

    protected $description = 'List all feature flags and their current state';

    public function handle(FeatureFlagService $service): int
    {
        $rows = array_map(
            fn (Feature $feature) => [
                $feature->value,
                $feature->isEnabled() ? '<fg=green>enabled</>' : '<fg=red>disabled</>',
            ],
            Feature::cases(),
        );

        $this->table(['Flag', 'Status'], $rows);

        return self::SUCCESS;
    }
}
