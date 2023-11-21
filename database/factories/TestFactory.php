<?php

namespace Database\Factories;

use App\Models\Test;
use App\Models\Theme;
use Illuminate\Database\Eloquent\Factories\Factory;

class TestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // Selecciona un tema aleatorio
        $theme = Theme::all()->random();

        return [
            'name_test' => $this->faker->sentence,
            'content' => $this->faker->paragraph,
            'theme_id' => $theme->id,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
