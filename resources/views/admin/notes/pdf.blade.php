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
    </div>


    <h4>Lista de Notas </h4>
    <table id="table" class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Examen</th>
                <th>Nota</th>
                <th>Tema</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                @foreach ($user->test_user as $test_user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->surname }}</td>
                        <td>{{ $test_user->test->name_test }}</td>
                        <td>{{ $test_user->points }}</td>
                        <td>{{ $test_user->test->theme->name_theme }}</td>
                    </tr>
                @endforeach
            @endforeach
        </tbody>
    </table>

</body>

</html>
