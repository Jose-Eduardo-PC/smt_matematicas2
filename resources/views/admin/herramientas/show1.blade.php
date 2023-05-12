@extends('layouts.user')

<head>
    <title>Calculadora gráfica</title>
    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mathjs/9.4.4/math.min.js"></script>
</head>

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-3">
                    <input type="text" id="equation1" placeholder="primera ecuación" autocomplete="on"><span
                        style="color: rgb(0, 102, 255);">F1</span><br><br>
                    <input type="text" id="equation2" placeholder="segunda ecuación"> <span
                        style="color: rgb(236, 99, 45);">F2</span><br><br>
                    <input type="text" id="equation3" placeholder="tercera ecuación"> <span
                        style="color: rgb(26, 129, 16);">F3</span><br><br>
                    <button class="btn btn-info" onclick="plot()">Graficar</button>
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
                yValues1.push(math.evaluate(equation1, {
                    x: x
                }));
                yValues2.push(math.evaluate(equation2, {
                    x: x
                }));
                yValues3.push(math.evaluate(equation3, {
                    x: x
                }));
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
                    title: '< - -x- - >'
                },
                yaxis: {
                    title: '< - -y- - >',
                    scaleanchor: 'x',
                    scaleratio: 1
                },
                height: 550 // Altura del gráfico en píxeles
            };

            Plotly.newPlot('myDiv', data, layout);
        }
    </script>
@endsection

@section('css')
    <style>
        input[type="text"] {
            border-radius: 5px;
        }
    </style>
@endsection
