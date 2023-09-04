@extends('layouts.user')

<head>
    <title>Listado de Temas</title>
</head>
@section('content')
    <div class="card">
        <div class="card-body">
            <h2>Listado de Temas</h2>
            <div class="row">
                @foreach ($themes as $theme)
                    <a href="{{ route('theme_show', $theme) }}" class="col-md-6">
                        <div class="card card-dm">
                            <div class="card-body">
                                <i class="ni ni-books text-blue"><b>&nbsp{{ $theme->name_theme }}</b></i>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
            <a href="{{ route('menu') }}" class="btn btn-warning">Volver</a>
        </div>
    </div>
@endsection
@section('js')
@endsection
@section('css')
    <style>
        .card {
            margin: 10px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            transition: 0.3s;
        }

        .card-dm:hover {
            box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
            transform: scale(1.1);
        }

        .card-body {
            padding: 15px 15px;
        }
    </style>
@endsection
