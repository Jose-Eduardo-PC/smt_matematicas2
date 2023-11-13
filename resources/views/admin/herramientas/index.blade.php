@extends('layouts.user')

<head>
    <title>Opciones de Herramientas</title>
</head>

@section('content')
    <div class="card">
        <div class="card-body">
            <H2>Herramientas Matematicas</H2>
            <br>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th class="text-light"><b>Herramienta</b></th>
                        <th class="text-light"><b>Descripcion</b></th>
                        <th class="text-light"><b>Opciones</b></th>
                    </tr>
                    <tr>
                        <td>Tabla de Funciones Trigonometricas (Cos,tan,seno)</td>
                        <td>Genera una tabla de 1 a 360 con las valores Cosenos,senos y tangentes</td>
                        <td><a href="{{ url('tool5') }}" class="btn btn-success">Usar</a></td>
                    </tr>
                    <tr>
                        <td>Conversor de Funciones Trigonometricas (Cos,tan,seno)</td>
                        <td>Obtiene valores de angulos y valor numericos de las funciones </td>
                        <td><a href="{{ url('tool1') }}" class="btn btn-success">Usar</a></td>
                    </tr>
                    <tr>
                        <td>Calculadora Grafica de Funciones </td>
                        <td>Genera la funcion lineal en el plano cartesiano</td>
                        <td><a href="{{ url('tool2') }}" class="btn btn-success">Usar</a></td>
                    </tr>
                    <tr>
                        <td>Calculadora de parametros de trinagulos(Lados y angulos)</td>
                        <td>Genera un triangulo cuando le das los valores suficientes</td>
                        <td><a href="{{ url('tool3') }}" class="btn btn-success">Usar</a></td>
                    </tr>
                    <tr>
                        <td>Calculadora de Amplitud y periodo</td>
                        <td>Genera un grafico con la funcion trigonometrica y encuentra su amplitu y periodo</td>
                        <td><a href="{{ url('tool6') }}" class="btn btn-success">Usar</a></td>
                    </tr>
            </table>
        </div>
        <a href="{{ route('menu') }}" class="btn btn-warning">Volver</a>
    </div>
@endsection

@section('js')
@endsection

@section('css')
@endsection
