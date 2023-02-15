@extends('layouts.admin')

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
                                <h5 class="card-title text-uppercase text-muted mb-0">Cursos Existentes</h5>
                                <span class="h2 font-weight-bold mb-0">{{ $curso }}</span>
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
                                <span class="h2 font-weight-bold mb-0">{{ $actividad }}</span>
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
                                <span class="h2 font-weight-bold mb-0">{{ $examen }}</span>
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
        <div class="card">
            <div class="card-header">
                <table id="table-cursos" class="table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Cursos</th>
                            <th>Visitas</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    @endsection

    @section('css')
        <!-- Datatables -->
        <link href="{{ asset('admin/assets/vendor/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('admin/assets/vendor/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') }}"
            rel="stylesheet">
        <link href="{{ asset('admin/assets/vendor/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') }}"
            rel="stylesheet">
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
            $('#table-cursos').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": "/api/cursos",
                "columns": [{
                        data: 'id'
                    },
                    {
                        data: 'titulo'
                    },
                    {
                        data: 'visitas'
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
