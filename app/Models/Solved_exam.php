<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solved_exam extends Model
{
    use HasFactory;

    protected $fillable = [
        'selected_question',
        'question_id',
        'user_id'
    ];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function test_user()
    {
        return $this->belongsTo(Test_user::class);
    }
}
