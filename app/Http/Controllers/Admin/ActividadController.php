<?php

namespace App\Http\Controllers\Admin;


use App\Models\Actividad;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\Controller;
use App\Http\Requests\Actividad\StoreRequest;
use App\Http\Requests\Actividad\UpdateRequest;
use App\Models\Curso;

class ActividadController extends Controller
{
    public function datatables()
    {
        return DataTables::of(Actividad::select('id', 'nombre', 'descripcion'))
            ->addColumn('btn', 'admin.actividades.partials.btn')
            ->rawColumns(['btn'])
            ->toJson();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $actividades = Actividad::all();
        return view('admin.actividades.index', compact('actividades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cursos = Curso::all();
        $actividad = new Actividad();
        return view('admin.actividades.create', compact('actividad', 'cursos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $actividad = (new Actividad())->fill($request->validated());
        $actividad->save();
        return redirect()->route('actividades.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Actividad $actividade)
    {
        return view('admin.actividades.show', compact('actividade'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Actividad $actividade)
    {
        $cursos = Curso::all();
        return view('admin.actividades.edit', compact('actividade', 'cursos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Actividad $actividad)
    {
        $actividad->update($request->validated());
        return redirect()->route('actividades.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Actividad $actividad)
    {
        $actividad->delete();
        return redirect()->route('actividades.index')->with('eliminar', 'ok');
    }
}
