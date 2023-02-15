<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pregunta extends Model
{
    use HasFactory;

    protected $fillable = [
        'enunciado',
        'incisoA',
        'incisoB',
        'incisoC',
        'incisoD',
        'incisoCorrecto',
        'examen_id',
    ];

    public function examen()
    {
        return $this->belongTo(Examen::class);
    }
}
