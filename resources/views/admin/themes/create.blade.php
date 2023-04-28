@extends('layouts.admin_create')

<head>
    <title>Crear Tema</title>
</head>

@section('content')
    <div class="card">
        <div class="card-body">
            <h3 class="text-center my-3">Crear nuevo Tema</h3>
            <form method="POST" action="{{ route('themes.store') }}" enctype="multipart/form-data">
                @csrf
                @include('admin.themes.partials._form')
                <br>
                <div>
                    <button class="btn btn-success" type="submit">Guardar</button>
                </div>
            </form>
        </div>
    </div>
@endsection
