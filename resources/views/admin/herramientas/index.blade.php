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
                        <td>Calculadora de Funciones Trigonometricas (Cos,tan,seno)</td>
                        <td>Obtiene valores de angulos y valor numericos de las funciones </td>
                        <td><a href="{{ url('tool1') }}" class="btn btn-success">Usar</a></td>
                    </tr>
                    <tr>
                        <td>Calculadora Grafica de Funciones Lineales </td>
                        <td>Genera la funcion lineal en el plano cartesiano</td>
                        <td><a href="{{ url('tool2') }}" class="btn btn-success">Usar</a></td>
                    </tr>
                    <tr>
                        <td>Calculadora de parametros de trinagulos(Lados y angulos)</td>
                        <td>Genera un triangulo cuando le das los valores suficientes</td>
                        <td><a href="{{ url('tool3') }}" class="btn btn-success">Usar</a></td>
                    </tr>
                    <tr>
                        <td>Calculadora Funciones Trigonometricas</td>
                        <td>Genera la funcion trigonometrica en el plano cartesiano</td>
                        <td><a href="{{ url('tool4') }}" class="btn btn-success">Usar</a></td>
                    </tr>
            </table>
        </div>
    </div>
@endsection

@section('js')
@endsection

@section('css')
@endsection
