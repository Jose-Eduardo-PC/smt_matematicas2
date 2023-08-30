@extends('layouts.admin_index')

<Head>
    <title>Usuarios</title>
</Head>
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center">
                <h1>Listado de usuarios</h1>
                <a href="{{ route('users.create') }}" class="btn btn-success">Crear nuevo Usuario</a>
            </div>
            <br>
            <table id="table" class="table table-sm table-hover">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nombres</th>
                        <th scope="col">Apellidos</th>
                        <th scope="col">Email</th>
                        <th scope="col">Roles</th>
                        <th class="centrado" scope="col">Opciones</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection
@section('js')
@endsection
@section('datatables-script')
@endsection
@section('table')
    <script>
        var columns = [{
                data: 'id'
            },
            {
                data: 'name'
            },
            {
                data: 'surname'
            },
            {
                data: 'email'
            },
            {
                data: 'role'
            },
            {
                data: 'btn',
                orderable: false,
                searchable: false
            }
        ];
        showTable('/api/users', columns);
    </script>
@endsection
@section('sweetalert-script')
@endsection
@section('css')
    <style>
        .centrado {
            text-align: center;
        }
    </style>
@endsection
