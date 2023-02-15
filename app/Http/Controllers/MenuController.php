<?php

namespace App\Http\Controllers;

use App\Models\Actividad;
use App\Models\User;
use App\Models\Curso;
use App\Models\Examen;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        $user = User::count();
        $curso = Curso::count();
        $actividad = Actividad::count();
        $examen = Examen::count();
        return view('menu', compact('user', 'curso', 'actividad', 'examen'));
    }
}
