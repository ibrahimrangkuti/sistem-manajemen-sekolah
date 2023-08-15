<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'class_id' => 1,
            'nis' => rand(10000000, 99999999),
            'name' => fake()->name(),
            'email' => fake()->unique()->email(),
            'password' => bcrypt('123'),
            'gender' => fake()->randomElement(['L', 'P']),
            'address' => fake()->address(),
            'place_of_birth' => 'Tangerang',
            'date_of_birth' => fake()->date()
        ];
    }
}
