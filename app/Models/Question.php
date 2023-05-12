<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'statement',
        'incisoA',
        'incisoB',
        'incisoC',
        'incisoD',
        'correct_paragraph',
        'test_id',
    ];

    public function test()
    {
        return $this->belongsTo((Test::class));
    }
    public function solved_exam($user_id)
    {
        return $this->hasOne(Solved_exam::class)->where('user_id', $user_id)->first();
    }
}
