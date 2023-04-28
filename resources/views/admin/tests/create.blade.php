@extends('layouts.admin_create')

<head>
    <title>Nuevo Examen</title>
</head>
@section('content')
    <div class="card">
        <div class="card-body">
            <h3 class="text-center my-3">Crear nuevo Examen</h3>
            <form method="POST" action="{{ route('tests.store') }}">
                @csrf
                @include('admin.tests.partials._form')
                <br>
                <div>
                    <button class="btn btn-success" type="submit">Guardar</button>
                </div>
            </form>
        </div>
    </div>
@endsection
