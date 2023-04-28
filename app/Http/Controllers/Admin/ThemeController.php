<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;
use App\Http\Requests\Theme\StoreRequest;
use App\Http\Requests\Theme\UpdateRequest;
use App\Models\Theme;

class ThemeController extends Controller
{
    public function datatables()
    {
        return DataTables::of(Theme::select('id', 'name_theme', 'description'))
            ->addColumn('btn', 'admin.themes.partials.btn')
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
        return view('admin.themes.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $theme = new Theme();
        return view('admin.themes.create', compact('theme'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        (new Theme())->fill($request->validated())->save();
        return redirect()->route('themes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // $theme->visitas = $theme->visitas + 1;
    // $theme->save();
    public function show(Theme $theme)
    {
        return view('admin.themes.show', compact('theme',));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Theme $theme)
    {
        return view('admin.themes.edit', compact('theme'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Theme $theme)
    {
        $theme->fill($request->validated());
        $theme->save();
        return redirect()->route('themes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Theme $theme)
    {
        $theme->delete();
        return redirect()->route('themes.index')->with('eliminar', 'ok');
    }
}
