<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class Solved_examFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return [
            'selected_question' => $this->faker->randomElement(['A', 'B', 'C', 'D']),
            'question_id' => 39,
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
