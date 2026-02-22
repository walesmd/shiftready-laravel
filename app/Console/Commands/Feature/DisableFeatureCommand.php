<?php

namespace App\Console\Commands\Feature;

use App\Models\FeatureFlag;
use Illuminate\Console\Command;

class DisableFeatureCommand extends Command
{
    protected $signature = 'feature:disable {name : The feature flag name}';

    protected $description = 'Disable a feature flag';

    public function handle(): int
    {
        $name = $this->argument('name');

        $flag = FeatureFlag::firstOrCreate(['name' => $name], ['is_enabled' => false]);
        $flag->update(['is_enabled' => false]);

        $this->info("Feature [{$name}] has been disabled.");

        return self::SUCCESS;
    }
}
