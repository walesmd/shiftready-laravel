<?php

namespace Database\Seeders;

use App\Enums\Feature;
use App\Models\FeatureFlag;
use Illuminate\Database\Seeder;

class FeatureFlagSeeder extends Seeder
{
    public function run(): void
    {
        foreach (Feature::cases() as $feature) {
            FeatureFlag::firstOrCreate(
                ['name' => $feature->value],
                ['is_enabled' => false],
            );
        }
    }
}
