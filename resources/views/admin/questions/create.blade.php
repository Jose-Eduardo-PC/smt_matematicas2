@extends('layouts.admin_create')

<head>
    <title>Crear Pregunta</title>
</head>
@section('content')
    <div class="card">
        <div class="card-body">
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            <h3 class="text-center my-3">Crear Preguntas</h3>
            <form method="POST" action="{{ route('questions.store') }}">
                @csrf
                @include('admin.questions.partials._form')
                <br>
                <div>
                    <button class="btn btn-success" type="submit">Guardar</button>
                </div>
            </form>
        </div>
    </div>
@endsection
