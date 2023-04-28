<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Test\StoreRequest;
use App\Http\Requests\Test\UpdateRequest;
use Yajra\Datatables\Datatables;
use App\Models\Test;
use App\Models\Theme;
use Illuminate\Http\Request;

class TestController extends Controller
{

    public function datatables()
    {
        return DataTables::of(Test::select('id', 'name_test', 'created_at', 'updated_at'))
            ->addColumn('btn', 'admin.tests.partials.btn')
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
        $tests = Test::all();
        return view('admin.tests.index', compact('tests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $themes = Theme::all();
        $test = new Test();
        return view('admin.tests.create', compact('test', 'themes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        (new Test())->fill($request->validated())->save();
        return redirect()->route('tests.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Test $test)
    {
        return view('admin.tests.show', compact('test'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Test $test)
    {
        $themes = Theme::all();
        return view('admin.tests.edit', compact('test'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Test $test)
    {
        $test->fill($request->validated());
        $test->save();
        return redirect()->route('tests.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Test $test)
    {
        $test->delete();
        return redirect()->route('tests.index')->with('eliminar', 'ok');
    }
}
