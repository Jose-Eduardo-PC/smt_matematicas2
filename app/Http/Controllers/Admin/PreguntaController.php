<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pregunta;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Http\Requests\Pregunta\StoreRequest;
use App\Http\Requests\Pregunta\UpdateRequest;
use App\Models\Examen;

class PreguntaController extends Controller
{
    public function datatables(Examen $examene)
    {

        return DataTables::of(Pregunta::where('examen_id', $examene->id)->select('id', 'enunciado', 'incisoCorrecto', 'incisoA', 'incisoB', 'incisoC', 'incisoD'))
            ->addColumn('incisos', function (Pregunta $pregunta) {
                return '<b>A)</b> ' . $pregunta->incisoA . '<br><b>B)</b> '  . $pregunta->incisoB . '<br><b>C)</b> ' . $pregunta->incisoC . '<br><b>D)</b> ' . $pregunta->incisoD . '<br>';
            })
            ->addColumn('incisoCorrecto', function (Pregunta $pregunta) {
                return '<b>' . $pregunta->incisoCorrecto . '</b>';
            })
            ->addColumn('btn', 'admin.preguntas.partials.btn')
            ->rawColumns(['incisos', 'btn', 'incisoCorrecto'])
            ->toJson();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.preguntas.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $pregunta = new Pregunta();
        return view('admin.preguntas.create', compact('pregunta', 'id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        Pregunta::create($request->validated());
        return redirect()->route('examenes.show', $request->examen_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Pregunta $pregunta)
    {
        return view('admin.preguntas.show', compact('pregunta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
