@extends('layouts.admin_create')

<head>
    <title>Editar Tema</title>
</head>
@section('content')
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('themes.update', $theme) }}" enctype="multipart/form-data">
                @csrf
                @method('put')
                @include('admin.themes.partials._form')
                <br>
                <div>
                    <button class="btn btn-success" type="submit">Guardar</button>
                </div>
            </form>
        </div>
    </div>
@endsection
