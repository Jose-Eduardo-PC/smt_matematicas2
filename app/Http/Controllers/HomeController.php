<?php

namespace App\Http\Controllers;


use App\Models\Activity;
use App\Models\User;
use App\Models\Test;
use App\Models\Theme;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Datatables;
use App\Jobs\RunBackup;
use App\Models\UserActivity;
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
        $user = User::count();
        $themeCount = Theme::count();
        $activity = Activity::count();
        $test = Test::count();
        $temas = DB::table('theme_users')
            ->join('themes', 'theme_users.theme_id', '=', 'themes.id')
            ->select('themes.name_theme', DB::raw('SUM(theme_users.visits) as total_visits'), DB::raw('SUM(theme_users.likes) as total_likes'))
            ->groupBy('themes.name_theme')
            ->orderBy('total_visits', 'desc')
            ->take(5)
            ->get();

        foreach ($temas as $tema) {
            $tema->total_visits = $tema->total_visits ?? 0;
            $tema->total_likes = $tema->total_likes ?? 0;
        }
        $status = Cache::get('backup-status', 'No se está realizando ningún backup.');
        $completedAt = Cache::get('backup-completed-at');
        $userActivities = UserActivity::with('user', 'activity')
            ->get()
            ->map(function ($userActivity) {
                return [
                    'user_name' => $userActivity->user->name,
                    'activity_name' => $userActivity->activity->name_activity,
                    'done' => $userActivity->done,
                    'like' => $userActivity->like,
                ];
            });
        $toolRatings = DB::table('tool_ratings')
            ->select('tool_name', DB::raw('AVG(rating) as average_rating'))
            ->groupBy('tool_name')
            ->get();
        return view('home', compact('temas', 'user', 'themeCount', 'activity', 'test', 'status', 'completedAt', 'toolRatings', 'userActivities'));
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
