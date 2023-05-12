<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\User;
use Yajra\Datatables\Datatables;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\User\StoreRequest;
use App\Http\Requests\User\UpdateRequest;

class UserController extends Controller
{
    public function datatables()
    {
        return DataTables::of(User::select('id', 'name', 'surname', 'email'))
            ->addColumn('role', function (User $user) {
                $return = '';
                foreach ($user->roles as $role) {
                    $return = '<span class="badge badge-primary mr-1">' . $role->name . '</span>';
                }
                return $return;
            })
            ->addColumn('btn', 'admin.users.partials.btn')
            ->rawColumns(['btn', 'role'])
            ->toJson();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = new User();
        $roles = Role::get();
        return view('admin.users.create', compact('user', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request, User $user)
    {
        $user = (new User)->fill($request->validated());
        if ($request->filled('roles')) {
            $user->assignRole($request->roles);
        }
        $user->password = Hash::make($request->password);
        if ($request->hasFile('avatar')) {
            $user->avatar = $request->file('avatar')->store('public/imagenes/imgavatars/');
        }
        $user->save();
        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //dd($user);
        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = Role::get();
        return view('admin.users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, User $user)
    {
        $request->validated();
        if ($request->hasFile('avatar')) {
            // Eliminar el archivo de avatar anterior si existe
            if ($user->avatar) {
                Storage::delete($user->avatar);
            }
            // Almacenar el nuevo archivo de avatar y asignar la ruta al usuario
            $user->avatar = $request->file('avatar')->store('public/imagenes/imgavatars/');
        }
        if ($request->filled('roles')) {
            $user->assignRole($request->roles);
        }
        $validatedData = $request->validated();
        unset($validatedData['avatar']);
        $user->update($validatedData);
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('eliminar', 'ok');
    }
}
