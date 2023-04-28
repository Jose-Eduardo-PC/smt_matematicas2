@extends('layouts.user')

<head>
    <title>Calculadora gráfica de ecuaciones lineales</title>
    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
</head>

@section('content')
    <div class="card">
        <div class="card-body">
            <h1>Gráfico de Funciones Lineales</h1>
            <div class="row">
                <div class="col-3">
                    <input type="text" id="equation1" placeholder="primera ecuación aquí"><br><br>
                    <input type="text" id="equation2" placeholder="segunda ecuación aquí"><br><br>
                    <input type="text" id="equation3" placeholder="tercera ecuación aquí"><br><br>
                    <button class="btn btn-info" onclick="plot()">Graficar</button>
                    <br><br>
                    <img class="canvastyle" src="\storage\imagenes\planocartesiano.jpg" alt="IMG" width="300"
                        height="200">
                </div>
                <div class="col-9">
                    <div id="myDiv"></div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        function plot() {
            var equation1 = document.getElementById("equation1").value;
            var equation2 = document.getElementById("equation2").value;
            var equation3 = document.getElementById("equation3").value;
            var xValues = [];
            var yValues1 = [];
            var yValues2 = [];
            var yValues3 = [];
            for (var x = -10; x < 10; x += 0.1) {
                xValues.push(x);
                yValues1.push(eval(equation1));
                yValues2.push(eval(equation2));
                yValues3.push(eval(equation3));
            }

            var trace1 = {
                x: xValues,
                y: yValues1,
                type: 'scatter',
                name: 'Función 1'
            };

            var trace2 = {
                x: xValues,
                y: yValues2,
                type: 'scatter',
                name: 'Función 2'
            };

            var trace3 = {
                x: xValues,
                y: yValues3,
                type: 'scatter',
                name: 'Función 3'
            };

            var data = [trace1, trace2, trace3];

            var layout = {
                title: 'Gráfico de las funciones',
                xaxis: {
                    title: 'x'
                },
                yaxis: {
                    title: 'y'
                }
            };

            Plotly.newPlot('myDiv', data, layout);
        }
    </script>
@endsection

@section('css')
@endsection
