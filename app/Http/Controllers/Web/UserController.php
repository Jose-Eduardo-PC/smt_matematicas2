<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Examen;
use App\Models\Nota;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {
        $examenes = Examen::all();
        return view('web.examen.index', compact('examenes'));
    }

    public function show(Examen $examene)
    {
        return view('web.examen.show', [
            'examene' => $examene,
            'nota' => Nota::where('examen_id', $examene->id)->first()
        ]);
    }

    public function showexamens(Examen $examene)
    {
        return view('web.examen.show');
    }

    public function store_examen(Request $request)
    {
        $examen = Examen::find($request->id);
        $user = auth()->user()->id;
        $puntuacion = 0;
        foreach ($examen->preguntas as $pregunta) {
            if ($pregunta->incisoCorrecto == $request->get("pregunta_correcta_$pregunta->id")) {
                $puntuacion += 10;
            }
        }
        $nota = new Nota();
        $nota->nota = $puntuacion;
        $nota->user_id = $user;
        $nota->examen_id = $examen->id;

        if ($puntuacion >= 51) {
            $nota->estado = "aprobado";
        } else {
            $nota->estado = "reprobado";
        }
        $nota->save();

        return redirect()->route('menu');
    }
}
