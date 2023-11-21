<?php

namespace Database\Seeders;

use App\Models\Question;
use App\Models\Solved_exam;
use App\Models\Test;
use App\Models\Test_user;
use App\Models\User;
use Illuminate\Database\Seeder;


class ExamsolvedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        $tests = Test::all();

        foreach ($tests as $test) {
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
