<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Examen;
use App\Models\Nota;
use App\Models\user_examen;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class NotaController extends Controller
{
    public function store(Request $request)
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

        return redirect()->route('notas.index');
    }
}
