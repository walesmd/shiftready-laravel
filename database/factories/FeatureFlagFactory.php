<?php

namespace Database\Factories;

use App\Enums\Feature;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FeatureFlag>
 */
class FeatureFlagFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->unique()->randomElement(array_column(Feature::cases(), 'value')),
            'is_enabled' => false,
        ];
    }

    public function enabled(): static
    {
        return $this->state(['is_enabled' => true]);
    }

    public function disabled(): static
    {
        return $this->state(['is_enabled' => false]);
    }

    public function forFeature(Feature $feature): static
    {
        return $this->state(['name' => $feature->value]);
    }
}
