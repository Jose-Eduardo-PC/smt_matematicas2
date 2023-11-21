<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Test;
use Illuminate\Database\Eloquent\Factories\Factory;

class Test_userFactory extends Factory
{
    /**
     * The model's default state.
     *
     * @var int
     */
    protected static $incrementingId = 1;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $points = $this->faker->numberBetween(0, 100);
        $status = $points > 51 ? 'aprobado' : 'reprobado';

        return [
            'id' => self::$incrementingId++,
            'points' => $points,
            'status' => $status,
            'user_id' => User::all()->random()->id,
            'test_id' => Test::all()->random()->id,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
