@extends('layouts.admin_index')
<title>Administracion</title>
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
                <table id="table-themes" class="table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Temas</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
        <h2>Temas mas visitados</h2>
        <div class="card">
            <div class="card-body">
                <!-- Projects table -->
                <table class="table align-items-center">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Temas</th>
                            <th scope="col">visitas</th>
                            <th scope="col">% likes</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">
                                Plano cartesiano
                            </th>
                            <td>
                                45
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <span class="mr-2">60%</span>
                                    <div>
                                        <div class="progress">
                                            <div class="progress-bar bg-gradient-danger" role="progressbar"
                                                aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"
                                                style="width: 60%;"></div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                Funciones Lineales
                            </th>
                            <td>
                                25
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <span class="mr-2">70%</span>
                                    <div>
                                        <div class="progress">
                                            <div class="progress-bar bg-gradient-success" role="progressbar"
                                                aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"
                                                style="width: 70%;"></div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                Funciones Trignometrica
                            </th>
                            <td>
                                20
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <span class="mr-2">80%</span>
                                    <div>
                                        <div class="progress">
                                            <div class="progress-bar bg-gradient-primary" role="progressbar"
                                                aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"
                                                style="width: 80%;"></div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <!-- Datatables -->
    <script src="{{ asset('admin/assets/vendor/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/datatables.net-buttons-bs/js/buttons.bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script>
        $('#table-themes').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": "/api/themes",
            "columns": [{
                    data: 'id'
                },
                {
                    data: 'name_theme'
                },
                {
                    data: 'btn',
                    "orderable": false,
                    "searchable": false
                },
            ],
            language: {
                "decimal": "",
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Entradas",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscar:",
                "zeroRecords": "Sin resultados encontrados",
                "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": ">>",
                    "previous": "<<"
                }
            },
        });
    </script>
    @if (session('eliminar') == 'ok')
        <script>
            Swal.fire(
                '¡Eliminado!',
                'EL registro ha sido eliminado.',
                'success'
            )
        </script>
    @endif
@endsection
@section('css')
    <!-- Datatables -->
    <link href="{{ asset('admin/assets/vendor/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/assets/vendor/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') }}"
        rel="stylesheet">
    <link href="{{ asset('admin/assets/vendor/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') }}"
        rel="stylesheet">
@endsection
