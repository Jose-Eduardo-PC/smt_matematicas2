@extends('layouts.user')

<head>
    <title>Calcular Amplitud y Periodo</title>
</head>

@section('content')
    <div class="row">
        <div class="input-container col-4">
            <label for="function">Función:</label>
            <select id="function">
                <option value="sin">Seno</option>
                <option value="cos">Coseno</option>
                <option value="tan">Tangente</option>
            </select>
        </div>
        <div class="input-container col-4">
            <label for="amplitude">Amplitud:</label>
            <input type="number" id="amplitude" value="1" min="0">
        </div>
        <div class="input-container col-4">
            <label for="period">Periodo:</label>
            <input type="number" id="period" value="2" min="0">
        </div>
    </div>
    <div id="trigFunctionContainer"></div>
@endsection

@section('js')
    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
    <script>
        document.getElementById('function').addEventListener('change', plotTrigFunction);
        document.getElementById('amplitude').addEventListener('change', plotTrigFunction);
        document.getElementById('period').addEventListener('change', plotTrigFunction);

        function plotTrigFunction() {
            var func = document.getElementById('function').value;
            var amplitude = document.getElementById('amplitude').value;
            var period = document.getElementById('period').value;
            var xValues = [];
            var yValues = [];

            for (var x = 0; x <= 4 * Math.PI; x += 0.1) {
                switch (func) {
                    case 'sin':
                        yValues.push(amplitude * Math.sin((2 * Math.PI / period) * x));
                        break;
                    case 'cos':
                        yValues.push(amplitude * Math.cos((2 * Math.PI / period) * x));
                        break;
                    case 'tan':
                        // Para evitar discontinuidades en la gráfica de la tangente, no calculamos los valores en los múltiplos de π
                        if (x % Math.PI === 0) {
                            yValues.push(null);
                        } else {
                            yValues.push(amplitude * Math.tan((2 * Math.PI / period) * x));
                        }
                        break;
                }
                xValues.push(x);
            }

            var trace = {
                x: xValues,
                y: yValues,
                mode: 'lines'
            };

            var layout = {
                title: 'Función Trigonométrica',
                xaxis: {
                    title: 'x'
                },
                yaxis: {
                    title: 'y'
                }
            };

            Plotly.react('trigFunctionContainer', [trace], layout);

        }

        plotTrigFunction();
    </script>
@endsection

@section('css')
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            color: #333;
        }

        .input-container {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: bold;
        }

        select,
        input {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        #trigFunctionContainer {
            width: 80%;
            /* Cambia esto al ancho que desees */
            height: 400px;
            /* Cambia esto a la altura que desees */
        }
    </style>
@endsection
