<?php

namespace Database\Factories;

use App\Data\ProfileOptions;
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
            'work_types' => fake()->randomElements(ProfileOptions::workTypeValues(), 2),
            'availability' => fake()->randomElements(ProfileOptions::availabilityValues(), 2),
        ];
    }
}
