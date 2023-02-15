@extends('layouts.user')

@section('content')
    <div class="card">
        <div class="card-body">
            <h3>Datos del examen</h3>
            <h4>{{ $examene->title }}</h4>
            <p>{{ $examene->contenido }}</p>
        </div>
    </div>
    @if ($nota == null)
        <div class="card">
            <div class="card-body">
                <h2>Listado de preguntas</h2>
                <form action="{{ route('examen_create') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{ $examene->id }}">

                    @foreach ($examene->preguntas as $pregunta)
                        <div>
                            <ul>
                                <h4>{{ $pregunta->enunciado }}</h4>
                                <li>
                                    <label>
                                        <input type="radio" name="pregunta_correcta_{{ $pregunta->id }}" value="A">
                                        <label><b>A)</b> {{ $pregunta->incisoA }}</label>
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" name="pregunta_correcta_{{ $pregunta->id }}" value="B">
                                        <label><b>B)</b>{{ $pregunta->incisoB }}</label>
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" name="pregunta_correcta_{{ $pregunta->id }}" value="C">
                                        <label><b>C)</b>{{ $pregunta->incisoC }}</label>
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" name="pregunta_correcta_{{ $pregunta->id }}" value="D">
                                        <label><b>D)</b>{{ $pregunta->incisoD }}</label>
                                    </label>
                                </li>
                            </ul>
                        </div>
                    @endforeach
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Terminar</button>
                    </div>
                </form>

            </div>
        </div>
    @else
        <div class="card">
            <div class="card-body">
                Ya diste el examen y tu califiacion fue
                {{ $nota->nota }}
            </div>
        </div>
    @endif

@endsection
@section('css')
@endsection

@section('js')
@endsection
