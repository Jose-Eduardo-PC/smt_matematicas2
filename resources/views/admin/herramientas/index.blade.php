@extends('layouts.user')

<head>
    <title>Opciones de Herramientas</title>
</head>

@section('content')
    @php
        $rating1 = $ratings->firstWhere('tool_name', 'Tabla de Cosenos, Senos y Cosenos');
        $rating2 = $ratings->firstWhere('tool_name', 'Funciones trigonometricas');
        $rating3 = $ratings->firstWhere('tool_name', 'Calcular Amplitud y Periodo');
        $rating4 = $ratings->firstWhere('tool_name', 'Calculadora de Triángulos');
        $rating5 = $ratings->firstWhere('tool_name', 'Calculadora gráfica');

    @endphp
    <div class="card">
        <div class="card-body">
            <H2>Herramientas Matematicas</H2>
            <br>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th class="text-light"><b>Herramienta</b></th>
                        <th class="text-light"><b>Descripcion</b></th>
                        <th class="text-light"><b>Usar</b></th>
                        <th class="text-light"><b>Calificacion</b></th>
                    </tr>
                    <tr>
                        <td>Tabla de Funciones Trigonometricas (Cos,tan,seno)</td>
                        <td>Genera una tabla de 1 a 360 con las valores Cosenos,senos y tangentes</td>
                        <td><a href="{{ url('tool1') }}" class="btn btn-success">Usar</a></td>
                        <td>
                            <div class="stars">
                                @if ($rating1)
                                    @for ($i = 1; $i <= 5; $i++)
                                        <span class="star {{ $i <= $rating1->rating ? 'gold' : '' }}"
                                            data-value="{{ $i }}">★</span>
                                    @endfor
                                @else
                                    @for ($i = 1; $i <= 5; $i++)
                                        <span class="star" data-value="{{ $i }}">★</span>
                                    @endfor
                                @endif
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Conversor de Funciones Trigonometricas (Cos,tan,seno)</td>
                        <td>Obtiene valores de angulos y valor numericos de las funciones </td>
                        <td><a href="{{ url('tool2') }}" class="btn btn-success">Usar</a></td>
                        <td>
                            <div class="stars">
                                @if ($rating2)
                                    @for ($i = 1; $i <= 5; $i++)
                                        <span class="star {{ $i <= $rating2->rating ? 'gold' : '' }}"
                                            data-value="{{ $i }}">★</span>
                                    @endfor
                                @else
                                    @for ($i = 1; $i <= 5; $i++)
                                        <span class="star" data-value="{{ $i }}">★</span>
                                    @endfor
                                @endif
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Calculadora de Amplitud y periodo</td>
                        <td>Genera un grafico con la funcion trigonometrica y encuentra su amplitu y periodo</td>
                        <td><a href="{{ url('tool3') }}" class="btn btn-success">Usar</a></td>
                        <td>
                            <div class="stars">
                                @if ($rating3)
                                    @for ($i = 1; $i <= 5; $i++)
                                        <span class="star {{ $i <= $rating3->rating ? 'gold' : '' }}"
                                            data-value="{{ $i }}">★</span>
                                    @endfor
                                @else
                                    @for ($i = 1; $i <= 5; $i++)
                                        <span class="star" data-value="{{ $i }}">★</span>
                                    @endfor
                                @endif
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Calculadora de parametros de triangulos(Lados y angulos)</td>
                        <td>Genera un triangulo cuando le das los valores suficientes</td>
                        <td><a href="{{ url('tool4') }}" class="btn btn-success">Usar</a></td>
                        <td>
                            <div class="stars">
                                @if ($rating4)
                                    @for ($i = 1; $i <= 5; $i++)
                                        <span class="star {{ $i <= $rating4->rating ? 'gold' : '' }}"
                                            data-value="{{ $i }}">★</span>
                                    @endfor
                                @else
                                    @for ($i = 1; $i <= 5; $i++)
                                        <span class="star" data-value="{{ $i }}">★</span>
                                    @endfor
                                @endif
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Calculadora Grafica de Funciones </td>
                        <td>Genera la funcion lineal en el plano cartesiano</td>
                        <td><a href="{{ url('tool5') }}" class="btn btn-success">Usar</a></td>
                        <td>
                            <div class="stars">
                                @if ($rating5)
                                    @for ($i = 1; $i <= 5; $i++)
                                        <span class="star {{ $i <= $rating5->rating ? 'gold' : '' }}"
                                            data-value="{{ $i }}">★</span>
                                    @endfor
                                @else
                                    @for ($i = 1; $i <= 5; $i++)
                                        <span class="star" data-value="{{ $i }}">★</span>
                                    @endfor
                                @endif
                            </div>
                        </td>
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
        .star {
            color: #ccc;
            font-size: 25px;
            margin: 0 4px;
            /* Reduce la distancia entre las estrellas a la mitad */
            padding: 0;
            cursor: pointer;
        }

        .gold {
            color: gold;
        }
    </style>
@endsection
