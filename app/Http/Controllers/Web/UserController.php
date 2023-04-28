<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Content;
use App\Models\Media_resource;
use App\Models\Test;
use App\Models\Test_user;
use App\Models\Theme;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //recursos multimedia
    public function index_media()
    {
        $resources = Media_resource::with('theme')->get();
        return view('web.recursos.index', compact('resources'));
    }

    public function show_media(Media_resource $media_resource, $resource)
    {
        $media_resource = Media_resource::find($resource);
        return view('web.recursos.show', compact('media_resource'));
    }
    //test
    public function index_theme()
    {
        $themes = Theme::all();
        return view('web.tema.index', compact('themes'));
    }
    public function show_theme(Theme $theme)
    {
        $theme = Theme::with('contents')->find($theme->id);
        return view('web.tema.show', compact('theme'));
    }
    //examen
    public function index_test()
    {
        $tests = Test::all();
        return view('web.examen.index', compact('tests'));
    }

    public function show_test(Test $test)
    {
        return view('web.examen.show', [
            'test' => $test,
            'test_user' => Test_user::where('test_id', $test->id)->first()
        ]);
    }

    public function store_examen(Request $request)
    {
        $test = Test::find($request->id);
        $user = auth()->user()->id;
        $puntuacion = 0;
        foreach ($test->questions as $question) {
            if ($question->correct_paragraph == $request->get("correct_paragraph_$question->id")) {
                $puntuacion += 10;
            }
        }

        Test_user::create([
            'user_id' => $user,
            'test_id' => $test->id,
            'points' => $puntuacion,
            'status' => $puntuacion >= 51 ? 'aprobado' : 'reprobado'
        ]);
        return redirect()->route('menu');
    }
}
