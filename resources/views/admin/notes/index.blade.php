@extends('layouts.admin_index')

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
@endsection
@section('js')
    <script>
        document.getElementById('exam-select').addEventListener('change', function() {
            updatePdfLink();
        });

        document.getElementById('user-select').addEventListener('change', function() {
            updatePdfLink();
        });

        function updatePdfLink() {
            var examSelectValue = document.getElementById('exam-select').value;
            var userSelectValue = document.getElementById('user-select').value;
            var pdfLink = document.getElementById('pdf-link');

            // Aquí debes reemplazar 'ruta-a-generar-pdf' con la ruta real a tu script de generación de PDF
            pdfLink.href = 'generar-pdf/' + examSelectValue + '/' + userSelectValue;

            console.log('Enlace a PDF actualizado: ' + pdfLink.href);
        }
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
        showTable('/api/notes', columns);

        function showTable(url, columns, examId, userId) {
            $('#table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: url,
                    data: {
                        exam_id: examId, // Pasa el examen seleccionado a tu endpoint
                        user_id: userId // Pasa el usuario seleccionado a tu endpoint
                    }
                },
                columns: columns,
            });
        }

        // Escucha el evento 'change' del select para recargar la tabla cuando se selecciona un examen o un usuario
        $('#exam-select, #user-select').on('change', function() {
            var examId = $('#exam-select').val(); // Obtiene el examen seleccionado
            var userId = $('#user-select').val(); // Obtiene el usuario seleccionado
            var table = $('#table').DataTable();
            table.destroy(); // Destruye la tabla actual
            showTable('/api/notes', columns, examId,
                userId); // Crea una nueva tabla con el examen y el usuario seleccionados
        });
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
    </style>
@endsection
