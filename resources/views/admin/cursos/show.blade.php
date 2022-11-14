@extends('layouts.user')

@section('content')
    <div class="py-12">
        <div>
            <div class="row">
                <div class="col-6">
                    <h4>{{ $curso->titulo }}</h4>
                    <p>{!! $curso->contenido !!}</p>
                    <img src="{{ $curso->imagenc }}" width="200px" height="200px">
                </div>
                <div class="col-6">
                    <h4>Ejemplo</h4>
                    <p>{!! $curso->ejemplo !!}</p>
                    <img src="{{ $curso->imagene }}" width="200px" height="200px">
                    <h4>Video de Apoyo al tema</h4>
                    <a href="{{ $curso->link }}">{{ $curso->link }}</a>
                    <h4>Actividad</h4>
                </div>
            </div>

        </div>
    </div>
@endsection
