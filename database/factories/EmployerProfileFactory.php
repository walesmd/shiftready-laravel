<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EmployerProfile>
 */
class EmployerProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'company_name' => fake()->company(),
            'title' => fake()->jobTitle(),
            'phone' => fake()->phoneNumber(),
            'industry' => fake()->randomElement(['moving', 'warehouse', 'automotive', 'events', 'retail', 'manufacturing', 'other']),
            'address' => fake()->streetAddress(),
            'city' => fake()->city(),
            'zip_code' => fake()->postcode(),
            'worker_count' => fake()->randomElement(['1-5', '6-15', '16-30', '31-50', '50+']),
            'roles' => fake()->sentence(),
        ];
    }
}
