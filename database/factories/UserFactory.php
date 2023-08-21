<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $roles = ['guru', 'siswa'];
        $randomRole = fake()->randomElement($roles);

        $attributes =  [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'password' => bcrypt('123'),
            'gender' => fake()->randomElement(['L', 'P']),
            'phone' => '08' . fake()->unique()->numerify('##########'),
            'address' => fake()->address(),
            'place_of_birth' => fake()->city(),
            'role' => $randomRole,
            'is_active' => '1'
        ];

        if ($randomRole == 'guru') {
            $attributes['nik'] = fake()->unique()->numerify('################');
            $attributes['date_of_birth'] = fake()->dateTimeBetween('-50 years', '-25 years')->format('Y-m-d');
        } elseif ($randomRole == 'siswa') {
            $attributes['class_id'] = rand(1, 2);
            $attributes['nis'] = fake()->unique()->numerify('########');
            $attributes['date_of_birth'] = fake()->dateTimeBetween('-18 years', '-15 years')->format('Y-m-d');
        }

        return $attributes;
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
