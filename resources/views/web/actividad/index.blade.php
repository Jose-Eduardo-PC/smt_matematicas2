@extends('layouts.user')

<head>
    <title>Actividades</title>
</head>
@section('content')
    <div class="card">
        <div class="card-body">
            <h2>Listado de Actividades</h2>
            <div class="row">
                @foreach ($activitys as $activity)
                    <a href="{{ route('activity_show', $activity) }}" class="col-md-6">
                        <div class="card card-dm">
                            <div class="card-body">
                                <i class="ni ni-books text-blue"><b>&nbsp{{ $activity->name_activity }}</b></i>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
        <a href="{{ route('menu') }}" class="btn btn-warning">Volver</a>
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
