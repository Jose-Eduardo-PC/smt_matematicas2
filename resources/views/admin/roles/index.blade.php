@extends('layouts.admin_index')

<head>
    <title>Temas</title>
</head>
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center">
                <h2>Listado de Temas</h2>
                <a href="{{ route('themes.create') }}" class="btn btn-success">Crear nuevo</a>
            </div>
            <br>
            <table id="table" class="table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Rol</th>
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
        ];
        showTable('/api/roles', columns);
    </script>
@endsection
@section('sweetalert-script')
@endsection
@section('css')
@endsection
