@extends('layouts.user')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card card-stats">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h4 class="card-title text-uppercase text-muted mb-0">Cursos</h4>
                                    <span class="font-weight-bold mb-0">Existentes: {{ $curso }}</span>
                                </div>
                                <div class="col-auto">
                                    <img src="/storage/imagenes/curso.png" alt="" width="80" height="80">
                                </div>
                            </div>
                            <p class="mt-3 mb-0 text-sm">
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <a href="#">
                        <div class="card card-stats">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h4 class="card-title text-uppercase text-muted mb-0">Actividades</h4>
                                        <span class="font-weight-bold mb-0">Existentes: {{ $curso }}</span>
                                    </div>
                                    <div class="col-auto">
                                        <img src="/storage/imagenes/curso.png" alt="" width="80" height="80">
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-sm">
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-xl-3 col-md-6">
                    <a href="{{ route('examen_index') }}">
                        <div class="card card-stats">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h4 class="card-title text-uppercase text-muted mb-0">Examenes</h4>
                                        <span class="font-weight-bold mb-0">Existentes: {{ $examen }}</span>
                                    </div>
                                    <div class="col-auto">
                                        <img src="/storage/imagenes/curso.png" alt="" width="80" height="80">
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
