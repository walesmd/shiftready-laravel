<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\WorkerProfile>
 */
class WorkerProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'phone' => fake()->phoneNumber(),
            'zip_code' => fake()->postcode(),
            'work_types' => fake()->randomElements(['moving', 'warehouse', 'driving', 'events', 'cleaning', 'labor'], 2),
            'availability' => fake()->randomElements(['weekday-mornings', 'weekday-afternoons', 'weekday-evenings', 'weekends'], 2),
        ];
    }
}
