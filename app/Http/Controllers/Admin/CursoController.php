<?php

namespace App\Http\Controllers\Admin;

use App\Models\Curso;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Curso\StoreRequest;
use App\Http\Requests\Curso\UpdateRequest;
use PhpParser\Node\Expr\New_;

class CursoController extends Controller
{

    public function datatables()
    {
        return DataTables::of(Curso::select('id', 'titulo', 'descripcion'))
            ->addColumn('btn', 'admin.cursos.partials.btn')
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
        $cursos = Curso::all();
        return view('admin.cursos.index', compact('cursos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $curso = new Curso();
        return view('admin.cursos.create', compact('curso'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {

        $request->validated();
        $curso = new Curso();
        $curso->titulo = $request->titulo;
        $curso->descripcion = $request->descripcion;
        $curso->contenido = $request->contenido;
        $curso->ejemplo = $request->ejemplo;
        $curso->link = $request->link;
        $imagec = $request->file('imagenc')->store('public/imagenes/imgcontenido/');
        $curso->imagenc = Storage::url($imagec);
        $imagee = $request->file('imagene')->store('public/imagenes/imgcontenido/');
        $curso->imagene = Storage::url($imagee);
        $curso->save();
        return redirect()->route('cursos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Curso $curso)
    {
        return view('admin.cursos.show', compact('curso'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Curso $curso)
    {
        return view('admin.cursos.edit', compact('curso'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        $request->validated();
        $curso = Curso::findOrFail($id);
        $imagenc = $request->file('imagenc')->store('public/imagenes/imgcontenido');
        $curso->imagenc = Storage::url($imagenc);
        $imagene = $request->file('imagene')->store('public/imagenes/imgcontenido');
        $curso->imagene = Storage::url($imagene);
        $curso->update($request->only('titulo', 'descripcion', 'contenido', 'ejemplo', 'link'));
        return redirect()->route('cursos.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Curso $curso)
    {
        $curso->delete();
        return redirect()->route('cursos.index')->with('eliminar', 'ok');
    }
}
