<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Content\StoreRequest;
use App\Http\Requests\Content\UpdateRequest;
use Illuminate\Support\Facades\Storage;
use Yajra\Datatables\Datatables;
use Illuminate\Http\Request;
use App\Models\Content;
use App\Models\Theme;


class ContentController extends Controller
{
    public function datatables(Theme $theme)
    {

        return DataTables::of(Content::where('theme_id', $theme->id)->select('id', 'name_cont', 'created_at', 'updated_at'))
            ->addColumn('btn', 'admin.contents.partials.btn')
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
        $content = Content::all();
        return view('admin.contents.index', compact('contents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create(Request $request)
    {
        $themeId = $request->input('themeId');
        $themes = Theme::all();
        $content = new Content();
        return view('admin.contents.create', ['themeId' => $themeId], compact('content', 'themes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request, Content $content)
    {
        $content = new Content();
        $content->fill($request->validated());
        $content->image_cont = $request->file('image_cont')->store('public/imagenes/imgavatars/');
        $content->save();
        return redirect()->route('themes.show', ['theme' => $content->theme_id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Content $content)
    {
        $theme = Theme::where('id', $content->theme_id)->first();
        $name_theme = $theme->name_theme;
        return view('admin.contents.show', compact('content', 'name_theme'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Content $content)
    {
        $themes = Theme::all();
        return view('admin.contents.edit', compact('content', 'themes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Content $content)
    {
        $request->validated();
        if ($request->hasFile('image_cont')) {
            // Eliminar el archivo de avatar anterior si existe
            if ($content->image_cont) {
                Storage::delete($content->image_cont);
            }
            // Almacenar el nuevo archivo de image_cont y asignar la ruta al usuario
            $content->image_cont = $request->file('image_cont')->store('public/imagenes/imgavatars/');
        }
        $validatedData = $request->validated();
        unset($validatedData['image_cont']);
        $content->update($validatedData);
        return redirect()->route('themes.show', ['theme' => $content->theme_id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Content $content)
    {
        $content->delete();
        return redirect()->route('themes.index')->with('eliminar', 'ok');
    }
}
