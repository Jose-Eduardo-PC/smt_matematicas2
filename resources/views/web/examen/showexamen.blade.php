@extends('layouts.user')

@section('content')
    <div class="card">
        <div class="card-body">
            <h2>Listado de Examenes</h2>
            <div class="row">
                @foreach ($examenes as $examen)
                    <a href="{{ route('examen_show', $examen) }}" class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h4>{{ $examen->title }}</h4>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
@endsection

@section('css')
@endsection
@section('js')
@endsection
