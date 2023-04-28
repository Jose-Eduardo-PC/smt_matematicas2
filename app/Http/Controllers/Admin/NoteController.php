<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\Controller;
use App\Models\Test;
use App\Models\Test_user;

class NoteController extends Controller
{
    public function datatables()
    {

        return DataTables::of(User::whereHas('roles', function ($query) {
            $query->where('name', 'Estudiante');
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
    public function show(Test_user $test_user)
    {
        $tests = Test::all();
        return view('admin.notes.show', compact('test_user', 'tests'));
    }
}
