<?php

namespace App\Http\Controllers;


use App\Models\Activity;
use App\Models\User;
use App\Models\Test;
use App\Models\Theme;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Datatables;
use App\Jobs\RunBackup;
use Illuminate\Support\Facades\Cache;



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
                        ->selectRaw('sum(visits)');
                }])
                ->addSelect(['total_likes' => function ($query) {
                    $query->from('theme_users')
                        ->whereColumn('theme_id', 'themes.id')
                        ->selectRaw('sum(likes)');
                }])
        )
            ->addColumn('btn', 'admin.themes.partials.btn')
            ->rawColumns(['btn'])
            ->toJson();
    }

    public function index()
    {
        // Obtén los datos de tu base de datos
        $temas = DB::table('theme_users')
            ->join('themes', 'theme_users.theme_id', '=', 'themes.id')
            ->select('themes.name_theme', DB::raw('SUM(theme_users.visits) as total_visits'), DB::raw('SUM(theme_users.likes) as total_likes'))
            ->groupBy('themes.name_theme')
            ->orderBy('total_visits', 'desc')
            ->take(6)
            ->get();

        foreach ($temas as $tema) {
            $tema->total_visits = $tema->total_visits ?? 0; // Si total_visits es null, usa 0
            $tema->total_likes = $tema->total_likes ?? 0; // Si total_likes es null, usa 0
        }
        $user = User::count();
        $themeCount = Theme::count();
        $activity = Activity::count();
        $test = Test::count();

        // Obtén el estado del backup
        $status = Cache::get('backup-status', 'No se está realizando ningún backup.');
        $completedAt = Cache::get('backup-completed-at');

        // Envía los datos a tu vista
        return view('home', compact('temas', 'user', 'themeCount', 'activity', 'test', 'status', 'completedAt'));
    }

    public function create()
    {
        RunBackup::dispatch();
        return back()->with('status', 'El backup se está creando.');
    }

    public function checkBackupStatus()
    {
        $status = Cache::get('backup-status', 'No se está realizando ningún backup.');
        $completedAt = Cache::get('backup-completed-at');
        return view('home', ['status' => $status, 'completedAt' => $completedAt]);
    }
}
