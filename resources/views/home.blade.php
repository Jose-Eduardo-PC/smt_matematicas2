@extends('layouts.admin_index')

<head>
    <title>Administracion</title>
</head>
@section('content')
    <div class="main-content" id="panel">
        <!-- Card stats -->
        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card card-stats">
                    <!-- Card body -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">Usuarios Existentes</h5>
                                <span class="h2 font-weight-bold mb-0">{{ $user }}</span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                                    <i class="ni ni-circle-08"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card card-stats">
                    <!-- Card body -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">Temas Existentes</h5>
                                <span class="h2 font-weight-bold mb-0">{{ $theme }}</span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                                    <i class="ni ni-books"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card card-stats">
                    <!-- Card body -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">Actividades Existentes</h5>
                                <span class="h2 font-weight-bold mb-0">{{ $activity }}</span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                                    <i class="ni ni-book-bookmark"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card card-stats">
                    <!-- Card body -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">Examenes Existentes</h5>
                                <span class="h2 font-weight-bold mb-0">{{ $test }}</span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                                    <i class="ni ni-single-copy-04"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <!-- Table Themes  --> --}}
        <h2>Temas Nuevos</h2>
        <div class="card">
            <div class="card-header">
                <table id="table" class="table table align-items-center">
                    <thead class="thead-light">
                        <tr>
                            <th>Id</th>
                            <th>Temas</th>
                            <th>visitas</th>
                            <th>Likes</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('table')
    <script>
        var columns = [{
                data: 'id'
            },
            {
                data: 'name_theme'
            },
            {
                data: 'total_visits'
            },
            {
                data: 'total_likes'
            },
            {
                data: 'btn',
                orderable: false,
                searchable: false
            }
        ];
        showTable('/api/temas-menu', columns);
    </script>
@endsection
@section('css')
@endsection
