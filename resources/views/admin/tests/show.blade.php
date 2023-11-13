@extends('layouts.admin_index')

<head>
    <title>Examen y Preguntas</title>
</head>
@section('content')
    <div class="card">
        <div class="card-body">
            <h3>Datos del examen</h3>
            <h4>{{ $test->name_test }}</h4>
            <p>{{ $test->content }}</p>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h2>Listado de preguntas</h2>
                <a href="{{ route('question.create-form', ['testId' => $test->id]) }}" class="btn btn-success">Crear
                    nuevo</a>
            </div>
            <table id="table" class="table table-sm table-hover">
                <thead>
                    <th>Id</th>
                    <th>Enunciado</th>
                    <th>Inciso Correcto</th>
                    <th>Opciones</th>
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
                data: 'statement'
            },
            {
                data: 'correct_paragraph'
            },
            {
                data: 'btn',
                "orderable": false,
                "searchable": false
            },
        ];
        showTable('/api/questions/{{ $test->id }}', columns);
    </script>
@endsection
@section('sweetalert-script')
@endsection
@section('css')
    <style>
        #table {
            width: 100% !important;
            /* Ajusta esto al ancho que prefieras */
            overflow-x: auto !important;
            /* Esto permitirá el desplazamiento horizontal si el contenido es demasiado ancho */
        }

        #table td:nth-child(2) {
            /* Esto selecciona la segunda columna, puedes ajustarlo según sea necesario */
            max-width: 200px !important;
            /* Ajusta esto al ancho máximo que prefieras para la columna */
            overflow: hidden !important;
            text-overflow: ellipsis !important;
            white-space: normal !important;
            /* Esto permitirá que el texto se desborde en varias líneas */
        }
    </style>
@endsection
