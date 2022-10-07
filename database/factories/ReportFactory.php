<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ReportFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'respondent_id' => $this->faker->randomElement([1, 2, 3, 4]),
            'question_id'   => $this->faker->randomElement([1, 2, 3]),
            'result'        => $this->faker->randomElement([1, 2, 3, 4, 5]),
        ];
    }
}
