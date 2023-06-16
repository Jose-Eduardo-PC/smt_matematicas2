<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Example\StoreRequest;
use App\Http\Requests\Example\UpdateRequest;
use App\Models\Content;
use App\Models\Example;
use Illuminate\Support\Facades\Storage;
use Yajra\Datatables\Datatables;
use Illuminate\Http\Request;

class ExampleController extends Controller
{
    public function datatables(Content $content)
    {
        return DataTables::of(Example::where('content_id', $content->id)->select('id', 'created_at', 'updated_at'))
            ->addColumn('btn', 'admin.examples.partials.btn')
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $contentId = $request->input('contentId');
        $examples = Example::all();
        $example = new Content();
        return view('admin.examples.create', ['contentId' => $contentId], compact('examples', 'example'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $example = new example();
        $example->fill($request->validated());
        if ($request->hasFile('image_ejm')) {
            $example->image_ejm = $request->file('image_ejm')->store('public/imagenes/imgavatars/');
        }
        $example->save();
        return redirect()->route('contents.show', ['content' => $example->content_id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Example $sample)
    {
        $content = Content::where('id', $sample->content_id)->first();
        $name_cont = $content->name_cont;
        return view('admin.examples.show', compact('sample', 'name_cont'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Example $sample)
    {
        $content = Content::all();
        return view('admin.examples.edit', compact('content', 'sample'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Example $sample)
    {
        $request->validated();
        if ($request->hasFile('image_ejm')) {
            if ($sample->image_ejm) {
                Storage::delete($sample->image_ejm);
            }
            $sample->image_ejm = $request->file('image_ejm')->store('public/imagenes/imgavatars/');
        }
        $validatedData = $request->validated();
        unset($validatedData['image_ejm']);
        $sample->update($validatedData);
        return redirect()->route('contents.show', ['content' => $request->content_id]);
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
