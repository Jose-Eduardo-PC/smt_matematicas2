<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;
use App\Models\Test_user;
use App\Models\User;
use App\Models\Test;

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

        $query = User::join('test_users', 'users.id', '=', 'test_users.user_id')
            ->join('tests', 'tests.id', '=', 'test_users.test_id')
            ->select('test_users.user_id', 'test_users.id', 'test_users.points', 'test_users.status', 'tests.name_test', 'users.name', 'test_users.test_id');

        if ($examId) { // Si se seleccionó un examen, filtra los datos
            $query->where('tests.id', $examId);
        }

        if ($userId) { // Si se seleccionó un usuario, filtra los datos
            $query->where('users.id', $userId);
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
        return view('admin.notes.index', compact('exams', 'users'));
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
}
