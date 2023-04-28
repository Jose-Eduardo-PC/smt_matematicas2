@extends('layouts.admin_show')

<head>
    <title>Ver Pregunta</title>
</head>
@section('content')
    <div class="card">
        <div class="card-body">
            <h3>Preguntas</h3>
            <p><b>A)</b> {{ $question->incisoA }}</p>
            <p><b>B)</b> {{ $question->incisoB }}</p>
            <p><b>C)</b> {{ $question->incisoC }}</p>
            <p><b>D)</b> {{ $question->incisoD }}</p>
            <p><b>Pregunta Correcta</b>: <b>{{ $question->correct_paragraph }}</b></p>
        </div>
    </div>
@endsection
