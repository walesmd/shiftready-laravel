<?php

namespace Database\Factories;

use App\Enums\UserType;
use App\Models\EmployerProfile;
use App\Models\WorkerProfile;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
            'user_type' => UserType::Worker,
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(['email_verified_at' => null]);
    }

    /**
     * Create a worker user with an associated worker profile.
     */
    public function worker(): static
    {
        return $this->state(['user_type' => UserType::Worker])
            ->afterCreating(function (\App\Models\User $user) {
                WorkerProfile::factory()->create(['user_id' => $user->id]);
            });
    }

    /**
     * Create an employer user with an associated employer profile.
     */
    public function employer(): static
    {
        return $this->state(['user_type' => UserType::Employer])
            ->afterCreating(function (\App\Models\User $user) {
                EmployerProfile::factory()->create(['user_id' => $user->id]);
            });
    }
}
