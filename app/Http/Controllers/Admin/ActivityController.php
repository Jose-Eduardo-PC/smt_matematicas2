<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\activity\StoreRequest;
use App\Http\Requests\activity\UpdateRequest;
use Yajra\Datatables\Datatables;
use App\Models\Activity;
use App\Models\Theme;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function datatables()
    {
        return DataTables::of(Activity::select('id', 'name_activity', 'theme_id'))
            ->addColumn('theme', function (Activity $activity) {
                return $activity->theme->name_theme;
            })
            ->addColumn('btn', 'admin.activities.partials.btn')
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
        return view('admin.activities.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $themes = Theme::all();
        $activity = new Activity();
        return view('admin.activities.create', compact('activity', 'themes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        (new Activity())->fill($request->validated())->save();
        return redirect()->route('activitys.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Activity $activity)
    {
        return view('admin.activities.show', compact('activity'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Activity $activity)
    {
        $themes = Theme::all();
        return view('admin.activities.edit', compact('activity', 'themes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Activity $activity)
    {
        $activity->fill($request->validated());
        $activity->save();
        return redirect()->route('activitys.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Activity $activity)
    {
        $activity->delete();
        return redirect()->route('activitys.index')->with('eliminar', 'ok');
    }
}
