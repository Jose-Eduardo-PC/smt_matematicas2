@extends('layouts.user')

<head>
    <title>Menu</title>
</head>

@section('content')
    <div class="card contenedor-opciones">
        <div class="card-body">
            <div class="row">
                <div class="col-xl-4 col-md-6">
                    <a href="{{ route('theme_index') }}">
                        <div class="card card-stats">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h4 class="card-title text-uppercase text-muted mb-0">Temas</h4>
                                        <span class="font-weight-bold mb-0">Existentes: {{ $theme }}</span>
                                    </div>
                                    <div class="col-auto">
                                        <img src="\storage\imagenes\temas_2.png" alt="" width="80"
                                            height="80">
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-sm">
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-xl-4 col-md-6">
                    <a href="{{ route('media_index') }}">
                        <div class="card card-stats">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h4 class="card-title text-uppercase text-muted mb-0">Recuros Multimedia</h4>
                                        <span class="font-weight-bold mb-0">Existentes: {{ $media_resource }}</span>
                                    </div>
                                    <div class="col-auto">
                                        <img src="\storage\imagenes\Recursos_r.png" alt="" width="80"
                                            height="80">
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-sm">
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-xl-4 col-md-6">
                    <a href="{{ route('activity_index') }}">
                        <div class="card card-stats">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h4 class="card-title text-uppercase text-muted mb-0">Actividades</h4>
                                        <span class="font-weight-bold mb-0">Existentes: {{ $activity }}</span>
                                    </div>
                                    <div class="col-auto">
                                        <img src="\storage\imagenes\Actividades_r.png" alt="" width="80"
                                            height="80">
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-sm">
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-xl-4 col-md-6">
                    <a href="{{ route('test_index') }}">
                        <div class="card card-stats">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h4 class="card-title text-uppercase text-muted mb-0">Examenes</h4>
                                        <span class="font-weight-bold mb-0">Existentes: {{ $test }}</span>
                                    </div>
                                    <div class="col-auto">
                                        <img src="\storage\imagenes\Examenes.png" alt="" width="80"
                                            height="80">
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-sm">
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-xl-4 col-md-6">
                    <a href="{{ route('tools') }}">
                        <div class="card card-stats">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h4 class="card-title text-uppercase text-muted mb-0">Herramientas</h4>
                                        <span class="font-weight-bold mb-0">Existentes: 3</span>
                                    </div>
                                    <div class="col-auto">
                                        <img src="\storage\imagenes\Herramientas-r.png" alt="" width="80"
                                            height="70">
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-sm">
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-xl-4 col-md-6">
                    <a href="{{ route('models') }}">
                        <div class="card card-stats">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h4 class="card-title text-uppercase text-muted mb-0">Simulaciones</h4>
                                        <span class="font-weight-bold mb-0">Existentes: 3</span>
                                    </div>
                                    <div class="col-auto">
                                        <img src="\storage\imagenes\simulacion.webp" alt="" width="80"
                                            height="80">
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-sm">
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('css')
    <style>
        .contenedor-opciones .card:hover .card-body {
            transform: scale(1.05);
            transition: transform 0.3s;
            border: 2px solid blue;
            border-radius: 25px;
            box-shadow: 0 4px 4px 0 rgba(0, 0, 0, 0.2);
            background-color: lightblue;
        }
    </style>
@endsection
