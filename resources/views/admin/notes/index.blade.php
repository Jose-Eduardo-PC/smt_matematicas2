@extends('layouts.admin_index2')

<head>
    <title>Notas</title>
</head>
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center">
                <h2>Listado de Examenes</h2>
            </div>
            <div>
                <a id="pdf-link" href="{{ route('generar-pdf') }}" class="btn btn-primary">Generar PDF</a><br>
            </div>
            <br>
            <div style="display: flex; justify-content: center; color: #color;">
                <select id="exam-select" style="margin-right: 10px;">
                    <option value="">Todos los exámenes</option> <!-- Opción por defecto -->
                    @foreach ($exams as $exam)
                        <option value="{{ $exam->id }}">{{ $exam->name_test }}</option>
                    @endforeach
                </select>
                <select id="user-select">
                    <option value="">Todos los usuarios</option> <!-- Opción por defecto -->
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
            <br>
            <div>
                <table id="table" class="table table-sm table-hover">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nombre del Usuario</th>
                            <th>Nombre del Examen</th>
                            <th>Puntos</th>
                            <th>Estado</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <h2>Listado de Estudiantes y Notas Trimestrales</h2>
            <br>
            <a id="pdf-link2" href="{{ route('generar-pdf2') }}" class="btn btn-primary">Generar PDF</a><br>
            <br>
            <div class="filter-section">
                <label for="status">Filtrar por estado:</label>
                <select id="status" class="estado-select">
                    <option value="all">Todos</option>
                    <option value="aprobado">Aprobados</option>
                    <option value="reprobado">Reprobados</option>
                </select>
            </div>
            <br>
            <table id="estudiantes" class="table table-sm table-hover">
                <thead>
                    <tr>
                        <th>Estudiante</th>
                        <th>Trimestre 1</th>
                        <th>Trimestre 2</th>
                        <th>Trimestre 3</th>
                        <th>Promedio</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($notas as $estudianteId => $datos)
                        @php
                            $claseEstado = 'estado-' . $datos['estado'];
                        @endphp
                        <tr class="{{ $claseEstado }}">
                            <td>{{ $estudianteId }}</td>
                            @foreach ($datos['notas'] as $trimestre => $notaPromedio)
                                <td>
                                    @if ($notaPromedio > 0)
                                        <p>{{ $notaPromedio }}</p>
                                    @else
                                        <p>N/A</p>
                                    @endif
                                </td>
                            @endforeach
                            <td>{{ $datos['promedio'] }}</td>
                            <td>
                                {{ $datos['estado'] == 'reprobado' ? 'Reprobado' : 'Aprobado' }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        function filtrarEstudiantes() {
            var selectedStatus = $("#status").val();
            $("#estudiantes tbody tr").each(function() {
                var estado = $(this).find('td:last').text().trim().toLowerCase();
                if (selectedStatus == "all") {
                    $(this).show();
                } else if (estado == selectedStatus) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        }

        $(document).ready(function() {
            $("#status").on("change", filtrarEstudiantes);
            // Llama a filtrarEstudiantes cada vez que los datos de la tabla cambien
            // Por ejemplo, podrías hacerlo en el callback de una petición AJAX
        });
    </script>
@endsection
@section('js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
        document.getElementById('exam-select').addEventListener('change', function() {
            updatePdfLink();
        });

        document.getElementById('user-select').addEventListener('change', function() {
            updatePdfLink();
        });
        document.getElementById('status').addEventListener('change', function() {
            updatePdfLink2();
        });

        function updatePdfLink() {
            var examSelectValue = document.getElementById('exam-select').value;
            var userSelectValue = document.getElementById('user-select').value;
            var pdfLink = document.getElementById('pdf-link');

            // Aquí debes reemplazar 'ruta-a-generar-pdf' con la ruta real a tu script de generación de PDF
            pdfLink.href = 'generar-pdf/' + examSelectValue + '/' + userSelectValue;

            console.log('Enlace a PDF actualizado: ' + pdfLink.href);
        }

        function updatePdfLink2() {
            var statusSelectValue = document.getElementById('status').value;
            var pdfLink2 = document.getElementById('pdf-link2');

            // Aquí debes reemplazar 'ruta-a-generar-pdf2' con la ruta real a tu script de generación de PDF
            pdfLink2.href = 'generar-pdf2/' + statusSelectValue;

            console.log('Enlace a PDF2 actualizado: ' + pdfLink2.href);
        }
        //
    </script>
@endsection
@section('datatables-script')
@endsection
@section('table')
    <script src="{{ asset('js/datatables.js') }}"></script>
    <script>
        var columns = [{
                data: 'id'
            },
            {
                data: 'name'
            },
            {
                data: 'name_test'
            },
            {
                data: 'points'
            },
            {
                data: 'status'
            },
            {
                data: 'btn',
                "orderable": false,
                "searchable": false
            },
        ];

        var language = {
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
        };

        function showTable(url, columns, examId, userId) {
            $('#table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: url,
                    data: {
                        exam_id: examId,
                        user_id: userId
                    }
                },
                columns: columns,
                language: language
            });
        }

        function reloadTableWithSelectedExamAndUser() {
            var examId = $('#exam-select').val();
            var userId = $('#user-select').val();
            var table = $('#table').DataTable();
            table.destroy();
            showTable('/api/notes', columns, examId, userId);
        }

        $('#exam-select, #user-select').on('change', reloadTableWithSelectedExamAndUser);

        showTable('/api/notes', columns);
    </script>
@endsection
@section('sweetalert-script')
@endsection
@section('css')
    <style>
        #exam-select {
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        #exam-select:hover {
            background-color: #f2f2f2;
            color: #333;
        }

        #user-select {
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        #user-select:hover {
            background-color: #f2f2f2;
            color: #333;
        }

        .estado-select {
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .estado-select:hover {
            background-color: #f2f2f2;
            color: #333;
        }
    </style>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
    <style>
        .nota-baja {
            color: red;
            font-weight: bold;
        }

        .nota-media {
            color: green;
            font-weight: bold;
        }

        .nota-alta {
            color: purple;
            /* Cambiado a morado */
            font-weight: bold;
        }

        .estado-aprobado {
            color: green;
            font-weight: bold;
        }

        .estado-reprobado {
            color: red;
            font-weight: bold;
        }
    </style>
@endsection
