<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Examen extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'contenido'];

    public function preguntas()
    {
        return $this->hasMany(Pregunta::class);
    }

    public function notas()
    {
        return $this->hasMany(Nota::class,);
    }
}
