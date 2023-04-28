@extends('layouts.admin_index')

<head>
    <title>Notas</title>
</head>
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center">
                <h2>Listado de Examenes</h2>
            </div>
            <table id="table" class="table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Rol</th>
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
                data: 'name'
            },
            {
                data: 'surname'
            },
            {
                data: 'role'
            },
            {
                data: 'btn',
                "orderable": false,
                "searchable": false
            },
        ];
        showTable('/api/notes', columns);
    </script>
@endsection
@section('sweetalert-script')
@endsection
@section('css')
@endsection
