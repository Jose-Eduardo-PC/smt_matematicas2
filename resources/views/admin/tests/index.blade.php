@extends('layouts.admin_index')

<head>
    <title>Examenes</title>
</head>
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center">
                <h1>Listado de Examenes</h1>
                <a href="{{ route('tests.create') }}" class="btn btn-success">Crear nuevo</a>
            </div>
            <br>
            <table id="table" class="table table-sm table-hover">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>fecha de creacion</th>
                        <th>fecha de actualisacion</th>
                        <th>Opciones</th>
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
                data: 'name_test'
            },
            {
                data: 'created_at',
                render: function(data, type, row) {
                    return moment(data).format('YYYY-MM-DD HH:mm:ss');
                },
            },
            {
                data: 'updated_at',
                render: function(data, type, row) {
                    return moment(data).format('YYYY-MM-DD HH:mm:ss');
                },
            },
            {
                data: 'btn',
                "orderable": false,
                "searchable": false
            },
        ];
        showTable('/api/tests', columns);
    </script>
@endsection
@section('sweetalert-script')
@endsection
@section('css')
@endsection
