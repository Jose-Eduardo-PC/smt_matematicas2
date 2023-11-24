<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Media_resource\StoreRequest;
use App\Http\Requests\Media_resource\UpdateRequest;
use App\Models\Media_resource;
use App\Models\Theme;
use Yajra\Datatables\Datatables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Media_resourceController extends Controller
{

    public function datatables()
    {
        return DataTables::of(Media_resource::select('id', 'link_video', 'resource_type', 'theme_id'))
            ->addColumn('theme', function (Media_resource $media_resource) {
                return $media_resource->theme->name_theme;
            })
            ->addColumn('btn', 'admin.media_resources.partials.btn')
            ->rawColumns(['btn', 'theme'])
            ->toJson();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.media_resources.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $themes = Theme::all();
        $media_resources = Media_resource::all();
        $media_resource = new Media_resource();
        return view('admin.media_resources.create', compact('media_resource', 'themes', 'media_resources'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function convertirEnlaceYouTube($enlace)
    {
        $partesEnlace = explode('/', $enlace);
        $idVideo = end($partesEnlace);

        // Comprueba si el ID del video contiene un signo de interrogación, lo que indica un enlace de formato nuevo
        if (strpos($idVideo, '?') !== false) {
            // Divide el ID del video en el signo de interrogación y toma la primera parte
            $partesIdVideo = explode('?', $idVideo);
            $idVideo = $partesIdVideo[0];
        }

        $enlaceIncrustado = 'https://www.youtube.com/embed/' . $idVideo;
        return $enlaceIncrustado;
    }

    public function store(StoreRequest $request, Media_resource $media_resource)
    {
        $media_resource = new Media_resource();
        $media_resource->fill($request->validated());

        if ($request->hasFile('link_video')) {
            // Si 'link_video' es un archivo, guarda el archivo con su nombre original y establece 'link_video' a la ruta del archivo
            $file = $request->file('link_video');
            $fileName = str_replace(' ', '_', $file->getClientOriginalName());
            $path = 'public/media_resources/' . $fileName;

            // Verifica si el archivo ya existe
            if (!Storage::exists($path)) {
                $path = $file->storeAs('public/media_resources', $fileName);
                $media_resource->link_video = $path;
            } else {
                return redirect()->back()->withErrors(['link_video' => 'El archivo ya existe.']);
            }
        } else {
            // Si 'link_video' no es un archivo, asume que es una URL y convierte el enlace de YouTube
            $enlaceCorto = $media_resource->link_video;
            $enlaceIncrustado = $this->convertirEnlaceYouTube($enlaceCorto);
            $media_resource->link_video = $enlaceIncrustado;
        }

        $media_resource->save();
        return redirect()->route('media_resources.index');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Media_resource $media_resource)
    {
        return view('admin.media_resources.show', compact('media_resource'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Media_resource $media_resource)
    {
        $themes = Theme::all();
        return view('admin.media_resources.edit', compact('media_resource', 'themes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Media_resource $media_resource)
    {
        $media_resource->fill($request->validated());

        if ($request->has('link_video')) {
            if ($request->hasFile('link_video')) {
                // Si 'link_video' es un archivo, guarda el archivo con su nombre original y establece 'link_video' a la ruta del archivo
                $file = $request->file('link_video');
                $fileName = str_replace(' ', '_', $file->getClientOriginalName());
                $path = 'public/media_resources/' . $fileName;

                // Verifica si el archivo ya existe
                if (!Storage::exists($path)) {
                    $path = $file->storeAs('public/media_resources', $fileName);
                    $media_resource->link_video = $path;
                } else {
                    return redirect()->back()->withErrors(['link_video' => 'El archivo ya existe.']);
                }
            } else {
                // Si 'link_video' no es un archivo, asume que es una URL y convierte el enlace de YouTube
                $enlaceCorto = $media_resource->link_video;
                $enlaceIncrustado = $this->convertirEnlaceYouTube($enlaceCorto);
                $media_resource->link_video = $enlaceIncrustado;
            }
        }

        $media_resource->save();
        return redirect()->route('media_resources.index');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Media_resource $media_resource)
    {
        $media_resource->delete();
        return redirect()->route('media_resources.index')->with('eliminar', 'ok');
    }
}
