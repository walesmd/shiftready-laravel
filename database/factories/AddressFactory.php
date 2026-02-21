<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Address>
 */
class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'place_id' => fake()->optional()->uuid(),
            'raw_address' => fake()->streetAddress().', '.fake()->city().', '.fake()->stateAbbr().' '.fake()->postcode(),
            'formatted_address' => null,
            'lat' => null,
            'lng' => null,
            'geocoded_at' => null,
        ];
    }

    public function geocoded(): static
    {
        return $this->state(fn (array $attributes) => [
            'formatted_address' => $attributes['raw_address'],
            'lat' => fake()->latitude(),
            'lng' => fake()->longitude(),
            'geocoded_at' => now(),
        ]);
    }
}
