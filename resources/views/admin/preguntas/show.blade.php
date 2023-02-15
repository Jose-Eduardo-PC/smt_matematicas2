@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-body">
            <h3>Preguntas</h3>
            <p>{{ $pregunta->incisoA }}</p>
            <p>{{ $pregunta->incisoB }}</p>
            <p>{{ $pregunta->incisoC }}</p>
            <p>{{ $pregunta->incisoD }}</p>
            <p><b>{{ $pregunta->incisoCorrecto }}</b></p>
        </div>
    </div>
@endsection
