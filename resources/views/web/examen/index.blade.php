@extends('layouts.user')

<head>
    <title>Examenes</title>
</head>
@section('content')
    <div class="card">
        <div class="card-body">
            <h2>Listado de Examenes</h2>
            <div class="row">
                @foreach ($tests as $test)
                    <a href="{{ route('test_show', $test) }}" class="col-md-6">
                        <div class="card card-dm">
                            <div class="card-body">
                                <div style="display: flex;">
                                    <h4><i class="ni ni-single-copy-04 text-blue">&nbsp</i>
                                        {{ $test->theme->name_theme }} - {{ $test->name_test }}</h4>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
        <a href="{{ route('menu') }}" class="btn btn-warning">Volver</a>
    </div>
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
@section('js')
@endsection
