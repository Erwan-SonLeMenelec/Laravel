<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'Name' => fake()->name(),
            'Surname' => fake()->name(),
            'Address' => fake()->address(),
            'created_at' => now(),
            'Number of command' => fake()->numberBetween(0,1000),
            'Mail_address' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
        ];
    }
}
