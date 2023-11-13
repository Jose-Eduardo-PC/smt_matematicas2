<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;
use App\Models\User;
use App\Models\Test;
use PDF;


class NoteController extends Controller
{

    public function generarPDF()
    {
        $data = [];
        $data['logo'] = asset('storage/imagenes/Escudo_Oliverio.png');


        // Obtén los datos de la tabla
        $users = User::whereHas('roles', function ($query) {
            $query->where('name', 'SuperAdministrador', 'Estudiante');
        })->with(['test_user.test' => function ($query) {
            $query->select('id', 'name_test', 'theme_id');
        }, 'test_user.test.theme' => function ($query) {
            $query->select('id', 'name_theme');
        }])->select('id', 'name', 'surname')->get();

        $data['users'] = $users;

        $pdf = PDF::loadView('admin.notes.pdf', $data);
        $pdf->setPaper('letter');
        return $pdf->download('lista-de-notas.pdf');
        //return view('admin.notes.pdf', $data);
    }

    public function datatables()
    {
        return DataTables::of(User::whereHas('roles', function ($query) {
            $query->where('name', 'SuperAdministrador', 'Estudiante');
        })->whereHas('test_user', function ($query) {
            // Aquí puedes agregar condiciones adicionales si es necesario
        })->select('id', 'name', 'surname'))
            ->addColumn('role', function (User $user) {
                $return = '';
                foreach ($user->roles as $role) {
                    $return = '<span class="badge badge-primary mr-1">' . $role->name . '</span>';
                }
                return $return;
            })
            ->addColumn('btn', 'admin.notes.partials.btn')
            ->rawColumns(['btn', 'role'])
            ->toJson();
    }
    public function index()
    {
        return view('admin.notes.index');
    }
    public function show($id)
    {
        $user = User::find($id);
        $test_users = $user->test_user;
        $tests = Test::all();

        $data = [
            'user' => $user,
            'tests' => $tests,
            'test_users' => $test_users,
        ];

        return view('admin.notes.show', $data);
    }
}
