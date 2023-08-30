@extends('layouts.admin_index')

<head>
    <title>Temas</title>
</head>
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center">
                <h1>Listado de Temas</h1>
                <a href="{{ route('themes.create') }}" class="btn btn-success">Crear nuevo</a>
            </div>
            <br>
            <table id="table" class="table table-sm table-hover">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Temas</th>
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
                data: 'name_theme'
            },

            {
                data: 'btn',
                orderable: false,
                searchable: false
            }
        ];
        showTable('/api/themes', columns);
    </script>
@endsection
@section('sweetalert-script')
@endsection
@section('css')
    <style>
        .centrado {
            text-align: center !important;
        }
    </style>
@endsection
