<?php

namespace App\Http\Controllers;


use App\Models\Activity;
use App\Models\User;
use App\Models\Test;
use App\Models\Test_user;
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

        $porcentaje = $this->calcularPorcentajeAprobadosReprobados();
        return view('home', compact('temas', 'user', 'themeCount', 'activity', 'test', 'status', 'completedAt', 'toolRatings', 'userActivities', 'porcentaje'));
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
    public function dividirTemasPorTrimestre()
    {
        $temas = Theme::all();

        $trimestres = $temas->chunk(4);

        return $trimestres;
    }
    public function obtenerExamenesPorEstudiante()
    {
        // Recuperar todos los usuarios con el rol de estudiante
        $estudiantes = User::role('estudiante')->get();

        // Recuperar todos los registros de exámenes en test_users
        $examenes = Test_user::with('test.theme')->get();

        // Agrupar los exámenes por usuario y por tema
        $examenesPorUsuarioPorTema = $examenes->groupBy([
            'user_id',
            function ($item, $key) {
                return $item->test->theme->id;
            },
        ]);

        // Convertir el array agrupado en una colección
        $examenesPorUsuarioPorTema = collect($examenesPorUsuarioPorTema);

        // Crear un array para almacenar los exámenes de cada usuario por tema
        $examenesPorEstudiantePorTema = [];

        // Para cada estudiante, guardar sus exámenes en el array por tema
        foreach ($estudiantes as $estudiante) {
            $examenesDelEstudiante = $examenesPorUsuarioPorTema->get($estudiante->id);
            if ($examenesDelEstudiante) {
                $examenesPorEstudiantePorTema[$estudiante->name] = $examenesDelEstudiante;
            } else {
                // Si el estudiante no tiene exámenes, inicializar su entrada con un array vacío
                $examenesPorEstudiantePorTema[$estudiante->name] = [];
            }
        }

        // Devolver los datos
        return $examenesPorEstudiantePorTema;
    }
    public function calcularNotasPorTrimestrePorEstudiante()
    {
        // Obtener los temas divididos por trimestre
        $trimestres = $this->dividirTemasPorTrimestre();

        // Obtener los exámenes por estudiante y por tema
        $examenesPorEstudiantePorTema = $this->obtenerExamenesPorEstudiante();

        // Crear un array para almacenar las notas por trimestre de cada estudiante
        $notasPorTrimestrePorEstudiante = [];

        // Para cada estudiante, calcular las notas por trimestre
        foreach ($examenesPorEstudiantePorTema as $estudianteId => $examenesPorTema) {
            $notasPorTrimestre = [];
            $sumaTrimestres = 0;

            // Para cada trimestre, calcular la nota promedio de los exámenes correspondientes
            foreach ($trimestres as $i => $temasDelTrimestre) {
                $notasPorTema = [];
                $sumaTemas = 0;
                $contadorTemas = 0;

                foreach ($temasDelTrimestre as $tema) {
                    $examenesPorTema = collect($examenesPorTema);
                    $examenesDelTema = $examenesPorTema->get($tema->id);
                    if ($examenesDelTema) {
                        $notaPromedio = $examenesDelTema->avg('points');
                        $notasPorTema[$tema->name] = $notaPromedio;
                        $sumaTemas += $notaPromedio;
                        $contadorTemas++;
                    }
                }

                $promedioTemas = $contadorTemas > 0 ? round($sumaTemas / $contadorTemas, 2) : 0;
                $notasPorTrimestre['Trimestre ' . ($i + 1)] = $promedioTemas;
                $sumaTrimestres += $promedioTemas;
            }

            // Calcular el promedio y el estado del estudiante
            $promedio = round($sumaTrimestres / count($trimestres), 2);
            $estado = $promedio < 51 ? 'reprobado' : 'aprobado';

            $notasPorTrimestrePorEstudiante[$estudianteId] = [
                'notas' => $notasPorTrimestre,
                'promedio' => $promedio,
                'estado' => $estado,
            ];
        }

        return $notasPorTrimestrePorEstudiante;
    }
    public function calcularPorcentajeAprobadosReprobados()
    {
        // Llamar a la función que calcula las notas por trimestre por estudiante
        $notasPorTrimestrePorEstudiante = $this->calcularNotasPorTrimestrePorEstudiante();

        // Calcular el número total de estudiantes
        $totalEstudiantes = count($notasPorTrimestrePorEstudiante);

        // Crear un array para almacenar el número de estudiantes aprobados y reprobados por trimestre
        $aprobadosReprobadosPorTrimestre = [];

        // Contadores para el total de aprobados y reprobados
        $totalAprobados = 0;
        $totalReprobados = 0;

        // Para cada estudiante, incrementar el contador de aprobados o reprobados por trimestre
        foreach ($notasPorTrimestrePorEstudiante as $estudianteId => $datosEstudiante) {
            foreach ($datosEstudiante['notas'] as $trimestre => $nota) {
                if (!isset($aprobadosReprobadosPorTrimestre[$trimestre])) {
                    $aprobadosReprobadosPorTrimestre[$trimestre] = ['aprobados' => 0, 'reprobados' => 0];
                }
                // Calcular el estado para cada trimestre individualmente
                $estado = $nota < 51 ? 'reprobado' : 'aprobado';
                if ($estado == 'aprobado') {
                    $aprobadosReprobadosPorTrimestre[$trimestre]['aprobados']++;
                    $totalAprobados++;
                } else {
                    $aprobadosReprobadosPorTrimestre[$trimestre]['reprobados']++;
                    $totalReprobados++;
                }
            }
        }

        // Calcular el porcentaje de estudiantes aprobados y reprobados por trimestre
        $porcentajeAprobadosReprobadosPorTrimestre = [];
        foreach ($aprobadosReprobadosPorTrimestre as $trimestre => $datosTrimestre) {
            $porcentajeAprobados = round($datosTrimestre['aprobados'] / $totalEstudiantes * 100, 2);
            $porcentajeReprobados = round($datosTrimestre['reprobados'] / $totalEstudiantes * 100, 2);
            $porcentajeAprobadosReprobadosPorTrimestre[$trimestre] = ['aprobados' => $porcentajeAprobados, 'reprobados' => $porcentajeReprobados];
        }

        // Calcular el porcentaje total de aprobados y reprobados
        $porcentajeTotalAprobados = round($totalAprobados / ($totalAprobados + $totalReprobados) * 100, 2);
        $porcentajeTotalReprobados = round($totalReprobados / ($totalAprobados + $totalReprobados) * 100, 2);

        // Agregar los porcentajes totales al array de resultados
        $porcentajeAprobadosReprobadosPorTrimestre['Total'] = ['aprobados' => $porcentajeTotalAprobados, 'reprobados' => $porcentajeTotalReprobados];

        return $porcentajeAprobadosReprobadosPorTrimestre;
    }
}
