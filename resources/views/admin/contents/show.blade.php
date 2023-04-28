@extends('layouts.admin_index')

@section('content')
    <div class="card">
        <div class="card-body">
            <h1>{{ $name_theme }}</h1>
            <h2><b>{{ $content->name_cont }}</b></h2>
            <p>{!! $content->text_cont !!}</p>
            <div class="divcent">
                <img src="{{ Storage::url($content->image_cont) }}" class="responsive-image zoom">
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h2>Ejemplos relacionados con el tema</h2>
                <a href="{{ route('example.create-form', ['contentId' => $content->id]) }}" class="btn btn-success">Crear
                    Ejemplo</a>
            </div>
            <table class="table" id="table-examples">
                <thead>
                    <th>Id</th>
                    <th>Fecha de Creacion</th>
                    <th>Fecha de Actualizacion</th>
                    <th>Opciones</th>
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
    <style>
        .responsive-image {
            max-width: 30%;
            height: auto;
        }

        .zoom {
            transition: transform .2s;
            overflow: hidden;
            position: relative;
            z-index: 1;
        }

        .zoom:hover {
            transform: scale(2);
        }

        .zoom:hover img {
            cursor: move;
        }

        .zoom:active img {
            cursor: grabbing;
        }

        .divcent {
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script>
        $('#table-examples').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": "/api/examples/{{ $content->id }}",
            "columns": [{
                    data: 'id'
                },
                {
                    data: 'created_at',
                    render: function(data, type, row) {
                        return moment(data).format('YYYY-MM-DD HH:mm:ss');
                    },
                },
                {
                    data: 'updated_at',
                    render: function(data, type, row) {
                        return moment(data).format('YYYY-MM-DD HH:mm:ss');
                    },
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
