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
            <table class="table" id="table">
                <thead>
                    <th>Id</th>
                    <th>Enunciado</th>
                    <th>Incisos</th>
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
                data: 'paragraph'
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
@endsection
