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

    public function examen()
    {
        return $this->belongsTo((Test::class));
    }
}
