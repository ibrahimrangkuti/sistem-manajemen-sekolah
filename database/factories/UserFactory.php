<?php

namespace Database\Factories;

use App\Models\Classes;
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
        $faker = \Faker\Factory::create('id_ID');

        $roles = ['guru'];
        $randomRole = $faker->randomElement($roles);

        $name = $faker->unique()->name();

        $classes = Classes::pluck('id');
        $randomClass = $faker->randomElement($classes);

        $attributes =  [
            'name' => $name,
            'email' => explode(' ', Str::lower($name))[0] . $faker->randomNumber() . '@gmail.com',
            'password' => bcrypt('123'),
            'gender' => $faker->randomElement(['L', 'P']),
            'phone' => '08' . $faker->unique()->numerify('##########'),
            'address' => $faker->address(),
            'place_of_birth' => $faker->city(),
            'role' => $randomRole,
            'is_active' => '1'
        ];

        if ($randomRole == 'guru') {
            $attributes['nik'] = $faker->unique()->numerify('################');
            $attributes['date_of_birth'] = $faker->dateTimeBetween('-50 years', '-25 years')->format('Y-m-d');
        } elseif ($randomRole == 'siswa') {
            $attributes['class_id'] = $randomClass;
            $attributes['nis'] = $faker->unique()->numerify('########');
            $attributes['date_of_birth'] = $faker->dateTimeBetween('-18 years', '-15 years')->format('Y-m-d');
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
