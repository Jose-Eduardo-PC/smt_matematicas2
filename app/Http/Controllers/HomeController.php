<?php

namespace App\Http\Controllers;


use App\Models\Activity;
use App\Models\User;
use App\Models\Test;
use App\Models\Theme;
use Yajra\Datatables\Datatables;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function datatables()
    {
        return DataTables::of(
            Theme::select('id', 'name_theme')
                ->addSelect(['total_visits' => function ($query) {
                    $query->from('theme_users')
                        ->whereColumn('theme_id', 'themes.id')
                        ->where('visits', '>', 0)
                        ->selectRaw('count(*)');
                }])
                ->addSelect(['total_likes' => function ($query) {
                    $query->from('theme_users')
                        ->whereColumn('theme_id', 'themes.id')
                        ->where('likes', 1)
                        ->selectRaw('count(*)');
                }])
        )
            ->addColumn('btn', 'admin.themes.partials.btn')
            ->rawColumns(['btn'])
            ->toJson();
    }
    public function index()
    {
        $user = User::count();
        $theme = Theme::count();
        $activity = Activity::count();
        $test = Test::count();
        return view('home', compact('user', 'theme', 'activity', 'test'));

        $themes = Theme::all();
        return view('admin.cursos.index', compact('themes'));
    }
}
