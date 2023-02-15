<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Examen;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Http\Requests\Examen\StoreRequest;
use App\Http\Requests\Examen\UpdateRequest;

class ExamenController extends Controller
{


    public function datatables()
    {
        return DataTables::of(Examen::select('id', 'title'))
            ->addColumn('btn', 'admin.examenes.partials.btn')
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
        $examenes = Examen::all();

        return view('admin.examenes.index', compact('examenes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $examene = new Examen();
        return view('admin.examenes.create', compact('examene'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        Examen::create($request->validated());
        return redirect()->route('examenes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Examen $examene)
    {
        return view('admin.examenes.show', compact('examene'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Examen $examene)
    {
        return view('admin.examenes.edit', compact('examene'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Examen $examene)
    {
        $examene->update($request->validated());
        return redirect()->route('examenes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Examen $examene)
    {
        $examene->delete();
        return redirect()->route('examenes.index')->with('eliminar', 'ok');
    }
}
