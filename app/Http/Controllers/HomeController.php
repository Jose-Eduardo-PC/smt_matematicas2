<?php

namespace App\Http\Controllers;

use App\Models\Actividad;
use App\Models\User;
use App\Models\Curso;
use App\Models\Examen;
use Yajra\Datatables\Datatables;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        $user = User::count();
        $curso = Curso::count();
        $actividad = Actividad::count();
        $examen = Examen::count();
        return view('home', compact('user', 'curso', 'actividad', 'examen'));

        $cursos = Curso::all();
        return view('admin.cursos.index', compact('cursos'));
    }
}
