<!DOCTYPE html>
<html>

<head>
    <title>Lista de Notas D</title>
    <style>
        /* Estilos para la tabla */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            font-size: 0.8em;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        /* Estilos para el logo */
        .logo {
            width: 50px;
            vertical-align: middle;
        }

        .divcent {
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>

<body>
    <div class="divcent">
        <img class="logo" src="{{ $logo }}" alt="Logo">
        <h3 style="display: inline-block">U.E Rvd. Oliverio Pellicelli</h3>
        <p>Fecha de Creacion del PDF: {{ $date }}</p>
    </div>

    <h4>Lista de Notas por trimestre</h4>
    <table id="table" class="table">
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
                <tr>
                    <td>{{ $estudianteId }}</td>
                    @foreach ($datos['notas'] as $trimestre => $notasPorTema)
                        <td>
                            @if (count($notasPorTema) > 0)
                                @foreach ($notasPorTema as $tema => $nota)
                                    <p><strong>{{ $tema }}</strong> {{ $nota }}</p>
                                @endforeach
                            @else
                                <p>N/A</p>
                            @endif
                        </td>
                    @endforeach
                    <td>{{ $datos['promedio'] }}</td>
                    <td>{{ $datos['estado'] == 'reprobado' ? 'Reprobado' : 'Aprobado' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
