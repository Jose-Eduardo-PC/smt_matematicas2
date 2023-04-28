@extends('layouts.admin_create')

<head>
    <title>Editar Examen</title>
</head>
@section('content')
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('tests.update', $test) }}" enctype="multipart/form-data">
                @csrf
                @method('put')
                @include('admin.tests.partials._form')
                <br>
                <div>
                    <button class="btn btn-success" type="submit">Guardar</button>
                </div>
            </form>
        </div>
    </div>
@endsection
