<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Media_resource;
use Carbon\Carbon;
use App\Models\Solved_exam;
use App\Models\Test_user;
use App\Models\Activity;
use App\Models\Theme;
use App\Models\User;
use App\Models\Test;


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
    //temas
    public function index_theme()
    {
        $themes = Theme::all();
        return view('web.tema.index', compact('themes'));
    }
    public function show_theme(Theme $theme)
    {
        $theme = Theme::with('contents')->find($theme->id);

        $user_id = auth()->id();
        $theme_user = DB::table('theme_users')->where('user_id', $user_id)->where('theme_id', $theme->id)->first();
        if (!$theme_user) {
            // Si no existe un registro para este usuario y tema, crear uno nuevo
            DB::table('theme_users')->insert([
                'user_id' => $user_id,
                'theme_id' => $theme->id,
                'visits' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        } else {
            // Si ya existe un registro para este usuario y tema, incrementar el contador de visitas
            DB::table('theme_users')->where('id', $theme_user->id)->increment('visits');
        }
        $user_liked = DB::table('theme_users')->where('user_id', $user_id)->where('theme_id', $theme->id)->where('likes', 1)->exists();
        return view('web.tema.show', compact('theme', 'user_liked'));
    }
    public function like_theme(Theme $theme)
    {
        $user_id = auth()->id(); // Obtener el id del usuario actual
        $theme_user = DB::table('theme_users')->where('user_id', $user_id)->where('theme_id', $theme->id)->first();
        if (!$theme_user) {
            // Si no existe un registro para este usuario y tema, crear uno nuevo con un "like"
            DB::table('theme_users')->insert([
                'user_id' => $user_id,
                'theme_id' => $theme->id,
                'visits' => 0,
                'likes' => 1
            ]);
        } else {
            // Si ya existe un registro para este usuario y tema, alternar el valor del campo "likes" (like/unlike)
            $new_likes_value = $theme_user->likes ? 0 : 1;
            DB::table('theme_users')->where('id', $theme_user->id)->update(['likes' => $new_likes_value]);
        }

        return back();
    }
    //examen
    public function index_test()
    {
        $tests = Test::with('theme')->get();
        return view('web.examen.index', compact('tests'));
    }
    public function show_test(Test $test)
    {
        $user_id = Auth::id();
        $testUser = Test_user::where('test_id', $test->id)->first();
        $hasTest = DB::table('test_users')
            ->where('user_id', $user_id)
            ->where('test_id', $test->id)
            ->exists();

        foreach ($test->questions as $question) {
            $options = [
                'A' => $question->incisoA,
                'B' => $question->incisoB,
                'C' => $question->incisoC,
                'D' => $question->incisoD,
            ];

            $question->options = $options;
        }

        return view('web.examen.show', [
            'test' => $test,
            'hasTest' => $hasTest,
            'test_user' => $testUser,
            'user_id' => $user_id,
        ]);
    }
    public function store_test(Request $request)
    {
        $test = Test::find($request->id);
        $user = auth()->user()->id;
        $puntuacion = 0;
        $puntosPorPregunta = 100 / count($test->questions);
        foreach ($test->questions as $question) {
            $selectedQuestion = $request->get("correct_paragraph_$question->id");
            if ($question->correct_paragraph == $selectedQuestion) {
                $puntuacion += $puntosPorPregunta;
            }
            Solved_exam::create([
                'question_id' => $question->id,
                'selected_question' => $selectedQuestion,
                'user_id' => $user,
            ]);
        }

        Test_user::create([
            'user_id' => $user,
            'test_id' => $test->id,
            'points' => $puntuacion,
            'status' => $puntuacion >= 51 ? 'aprobado' : 'reprobado'
        ]);
        return redirect()->route('menu');
    }
    //actividades
    public function index_activity()
    {
        $activitys = Activity::all();
        return view('web.actividad.index', compact('activitys'));
    }
    public function show_activity(Activity $activity)
    {
        $activity = Activity::find($activity->id);
        return view('web.actividad.show', compact('activity'));
    }
    public function show_usuario(User $user)
    {
        return view('web.usuario.show', compact('user'));
    }
    //modelo
    public function index_model()
    {
        return view('web.modelos.index');
    }
    public function show()
    {
        return view('web.modelos.show');
    }
    public function show1()
    {
        return view('web.modelos.show1');
    }
    public function show2()
    {
        return view('web.modelos.show2');
    }
}
