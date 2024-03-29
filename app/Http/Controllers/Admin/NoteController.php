<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;
use App\Models\Test_user;
use App\Models\User;
use App\Models\Test;
use App\Models\Theme;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use PDF;


class NoteController extends Controller
{
    public function generarPDF($exam_id = null, $user_id = null)
    {
        $data = [];
        $data['logo'] = asset('storage/imagenes/Escudo_Oliverio.png');

        // Obtén los datos de la tabla
        $users = User::whereHas('roles', function ($query) {
            $query->whereIn('name', ['SuperAdministrador', 'Profesor', 'Estudiante']);
        })
            ->whereHas('test_user', function ($query) use ($exam_id, $user_id) {
                if ($exam_id) {
                    $query->where('test_id', $exam_id);  // Filtra por examen si se proporcionó un examen
                }
                if ($user_id) {
                    $query->where('user_id', $user_id);  // Filtra por usuario si se proporcionó un usuario
                }
            })
            ->with(['test_user' => function ($query) use ($exam_id, $user_id) {
                $query->select('id', 'user_id', 'test_id', 'points', 'status');  // Incluye los campos 'points' y 'status'
                if ($exam_id) {
                    $query->where('test_id', $exam_id);  // Filtra por examen si se proporcionó un examen
                }
                if ($user_id) {
                    $query->where('user_id', $user_id);  // Filtra por usuario si se proporcionó un usuario
                }
            }, 'test_user.test' => function ($query) {
                $query->select('id', 'name_test', 'theme_id');
            }, 'test_user.test.theme' => function ($query) {
                $query->select('id', 'name_theme');
            }])
            ->select('id', 'name', 'surname')
            ->get();

        $data['users'] = $users;

        // Agrega la fecha actual al array de datos
        $data['date'] = now()->format('d-m-Y H:i:s');

        $pdf = PDF::loadView('admin.notes.pdf', $data);
        $pdf->setPaper('letter');
        return $pdf->download('lista-de-notas.pdf');
    }

    public function datatables()
    {
        $examId = request('exam_id'); // Obtiene el examen seleccionado
        $userId = request('user_id'); // Obtiene el usuario seleccionado
        $year = request('year'); // Obtiene el año seleccionado

        $query = User::join('test_users', 'users.id', '=', 'test_users.user_id')
            ->join('tests', 'tests.id', '=', 'test_users.test_id')
            ->select('test_users.user_id', 'test_users.id', 'test_users.points', 'test_users.status', 'tests.name_test', 'users.name', 'test_users.test_id');

        if ($examId) { // Si se seleccionó un examen, filtra los datos
            $query->where('tests.id', $examId);
        }

        if ($userId) { // Si se seleccionó un usuario, filtra los datos
            $query->where('users.id', $userId);
        }

        if ($year) { // Si se seleccionó un año, filtra los datos
            $query->whereYear('test_users.created_at', $year);
        }

        $users = $query->get();

        return DataTables::of($users)
            ->addColumn('btn', 'admin.notes.partials.btn')
            ->rawColumns(['btn'])
            ->make(true);
    }


    public function index()
    {
        $exams = Test::all();
        $users = User::all();
        $notas = $this->calcularNotasPorTrimestrePorEstudiante();

        // Obtiene los años únicos de la tabla 'Test_user'
        $years = DB::table('Test_users')->select(DB::raw('YEAR(created_at) as year'))->distinct()->get();

        // Pasa los años a la vista
        return view('admin.notes.index', compact('exams', 'users', 'notas', 'years'));
    }


    public function show($testUserId)
    {
        $testUser = Test_user::find($testUserId);
        $test = $testUser->test;
        $user_id = $testUser->user_id;

        foreach ($test->questions as $question) {
            $options = [
                'A' => $question->incisoA,
                'B' => $question->incisoB,
                'C' => $question->incisoC,
                'D' => $question->incisoD,
            ];

            $question->options = $options;
        }


        return view('admin.notes.show', [
            'test' => $test,
            'test_user' => $testUser,
            'user_id' => $user_id,
        ]);
    }

    public function dividirTemasPorTrimestre()
    {
        $temas = Theme::all();

        // Calcula el número de temas por trimestre.
        // La función ceil() redondea hacia arriba, asegurando que todos los temas se incluyan.
        $temasPorTrimestre = ceil($temas->count() / 3);

        $trimestres = $temas->chunk($temasPorTrimestre);

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

    public function generarPDF2($status = null)
    {
        $data = [];
        $data['logo'] = asset('storage/imagenes/Escudo_Oliverio.png');
        // Obtén las notas
        $notas = $this->calcularNotasPorTrimestrePorEstudiante();

        // Filtra las notas por estado si se proporcionó un estado
        if ($status) {
            $notas = array_filter($notas, function ($nota) use ($status) {
                return $nota['estado'] == $status;
            });
        }
        $data['notas'] = $notas;

        // Agrega la fecha y hora actual al array $data
        $data['date'] = now()->format('d-m-Y H:i:s');

        // Crea la vista del PDF
        $pdf = PDF::loadView('admin.notes.pdf2', $data);
        $pdf->setPaper('letter');
        return $pdf->download('lista-de-notas-por-trimestre.pdf');
    }
}
