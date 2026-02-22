<?php

namespace App\Console\Commands\Feature;

use App\Models\FeatureFlag;
use Illuminate\Console\Command;

class EnableFeatureCommand extends Command
{
    protected $signature = 'feature:enable {name : The feature flag name}';

    protected $description = 'Enable a feature flag';

    public function handle(): int
    {
        $name = $this->argument('name');

        $flag = FeatureFlag::firstOrCreate(['name' => $name], ['is_enabled' => false]);
        $flag->update(['is_enabled' => true]);

        $this->info("Feature [{$name}] has been enabled.");

        return self::SUCCESS;
    }
}
