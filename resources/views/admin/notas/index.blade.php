@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center">
                <h2>Listado de Examenes</h2>
                <a href="{{ route('examenes.create') }}" class="btn btn-success">Crear nuevo</a>
            </div>
            <br>
            <table id="table-examenes" class="table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre del estudiante</th>
                        <th>Examen</th>
                        <th>Nota</th>
                        <th>Estado</th>
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
    <link href="{{ asset('admin/assets/vendor/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') }}" rel="stylesheet">
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
        $('#table-examenes').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": "/api/user_examenes",
            "columns": [{
                    data: 'id'
                },
                {
                    data: 'name'
                },
                {
                    data: 'title'
                },
                {
                    data: 'nota'
                },
                {
                    data: 'estado'
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
