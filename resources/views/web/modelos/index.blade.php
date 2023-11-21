@extends('layouts.user')

<head>
    <title>Opciones de Simulaciones</title>
</head>

@section('content')
    <div class="card">
        <div class="card-body">
            <H2>Simulaciones Matematicas</H2>
            <br>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th class="text-light"><b>Simulacion</b></th>
                        <th class="text-light"><b>Descripcion</b></th>
                        <th class="text-light"><b>Opciones</b></th>
                    </tr>
                    <tr>
                        <td>
                            <h3>Graficando Rectas Pendiente-Intersección</h3>
                        </td>
                        <td class="descripcion">
                            <ul>
                                <li>Grafica una recta cuando dada la ecuación en la forma pendiente-intersección.</li>
                                <li>Escribe una ecuación en la forma pendiente-intersección dada la gráfica de una recta.
                                </li>
                                <li>Predice como al cambian los valores en una ecuación lineal se afectará la gráfica de la
                                    recta.</li>
                                <li>Predice como al cambiar la gráfica de una recta se afectará la ecuación.</li>
                            </ul>
                        </td>
                        <td><a href="{{ url('models1') }}" class="btn btn-success">Usar</a></td>
                    </tr>
                    <tr>
                        <td>
                            <h3>Graficando Rectas</h3>
                        </td>
                        <td class="descripcion">
                            <ul>
                                <li>Explica cómo la pendiente de una línea graficada se puede calcular.</li>
                                <li>Grafica una línea a partir de una ecuación dada, ya sea en forma pendiente-intersección
                                    o punto-pendiente.</li>
                                <li>Escribe una ecuación en la forma pendiente-intersección o punto-pendiente, dada una
                                    línea representada.</li>
                                <li>Predice cómo el cambio de variables en una ecuación lineal afectará a la línea
                                    representada.
                                </li>
                            </ul>
                        </td>
                        <td><a href="{{ url('models2') }}" class="btn btn-success">Usar</a></td>
                    </tr>
                    <tr>
                        <td>
                            <h3>Tour trigonométrico</h3>
                        </td>
                        <td class="descripcion">
                            <ul>
                                <li>Define las funciones trigonométricas para ángulos negativos y ángulos mayores de 90
                                    grados.</li>
                                <li> Traduce entre múltiples representaciones de funciones trigonométricas: como lados de un
                                    triángulo rectángulo inscrito en una circunferencia goniométrica, gráfica de la función
                                    vs. ángulo y valores numéricos de la función.</li>
                                <li>Deduce el signo (+, -, 0) de una función trigonométrica para cualquier ángulo dado sin
                                    una
                                    calculadora, empleando el concepto de circunferencia goniométrica.</li>
                                <li> Estima el valor de las funciones trigonométricas para cualquier ángulo sin una
                                    calculadora,
                                    empleando el concepto de circunferencia goniométrica.</li>
                                <li> Define las funciones trigonométricas exactas para ángulos especiales empleando grados o
                                    radianes como medidas de los ángulos .</li>
                            </ul>
                        </td>
                        <td><a href="{{ url('models3') }}" class="btn btn-success">Usar</a></td>
                    </tr>
            </table>
            <a href="{{ route('menu') }}" class="btn btn-warning">Volver</a>
        </div>
    </div>
@endsection

@section('js')
@endsection

@section('css')
    <style>
        .descripcion {
            max-width: 700px;
            text-align: left;
            overflow-x: auto;
        }
    </style>
@endsection
