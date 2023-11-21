<?php

namespace Database\Factories;

use App\Models\Question;
use App\Models\Test;
use Illuminate\Database\Eloquent\Factories\Factory;

class QuestionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // Selecciona un examen aleatorio
        $test = Test::all()->random();

        // Genera una respuesta correcta aleatoria
        $correct_paragraph = collect(['A', 'B', 'C', 'D'])->random();

        return [
            'statement' => $this->faker->sentence,
            'incisoA' => $this->faker->sentence,
            'incisoB' => $this->faker->sentence,
            'incisoC' => $this->faker->sentence,
            'incisoD' => $this->faker->sentence,
            'correct_paragraph' => $correct_paragraph,
            'test_id' => $test->id,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
