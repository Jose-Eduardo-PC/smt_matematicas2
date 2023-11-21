<?php

namespace Database\Seeders;

use App\Models\Question;
use App\Models\Solved_exam;
use App\Models\Test;
use App\Models\Test_user;
use App\Models\User;
use Illuminate\Database\Seeder;

class ExamSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create();

        $tests = Test::factory()->count(10)->create();

        foreach ($tests as $test) {
            for ($i = 0; $i < 10; $i++) {
                Question::factory()->create(['test_id' => $test->id]);
            }

            for ($i = 0; $i < 5; $i++) {
                $user = User::all()->random();
                Test_user::factory()->create(['user_id' => $user->id, 'test_id' => $test->id]);

                $questions = Question::where('test_id', $test->id)->get();

                foreach ($questions as $question) {
                    Solved_exam::factory()->create([
                        'question_id' => $question->id,
                        'user_id' => $user->id,
                        'selected_question' => $faker->randomElement(['A', 'B', 'C', 'D']),
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }
        }
    }
}
