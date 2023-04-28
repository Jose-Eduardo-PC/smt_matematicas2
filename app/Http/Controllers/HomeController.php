<?php

namespace App\Http\Controllers;


use App\Models\Activity;
use App\Models\User;
use App\Models\Test;
use App\Models\Theme;

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
