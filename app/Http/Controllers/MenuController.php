<?php

namespace App\Http\Controllers;

use App\Models\Actividad;
use App\Models\Activity;
use App\Models\User;
use App\Models\Examen;
use App\Models\Media_resource;
use App\Models\Test;
use App\Models\Theme;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        $user = User::count();
        $theme = Theme::count();
        $activity = Activity::count();
        $media_resource = Media_resource::count();
        $test = Test::count();
        return view('menu', compact('user', 'theme', 'activity', 'test', 'media_resource'));
    }
}
