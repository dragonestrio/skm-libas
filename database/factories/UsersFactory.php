<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class UsersFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id' => $this->faker->md5(),
            'email' => $this->faker->unique()->safeEmail(),
            'password' => bcrypt('password'),
            'level' => $this->faker->numberBetween(1, 3),
            'name' => $this->faker->name(),
            'phone' => $this->faker->e164PhoneNumber(),
            'gender' => $this->faker->randomElement(['L', 'P']),
            'address' => $this->faker->address(),
            'profile_pic' => $this->faker->randomElement(['a.jpg', 'b.jpg', 'c.jpg']),
            'date_born' => $this->faker->date(),
            'remember_token' => Str::random(10),
        ];
    }
}
