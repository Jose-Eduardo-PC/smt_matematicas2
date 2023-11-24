@extends('layouts.user')

<head>
    <title>Calcular Amplitud y Periodo</title>
</head>

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="input-container col-3">
                    <form id="calificar" method="POST" action="{{ route('rate3') }}">
                        @csrf
                        <div class="rating">
                            <input type="radio" id="star5" name="rating" value="5"
                                {{ $rating == 5 ? 'checked' : '' }} /><label for="star5"></label>
                            <input type="radio" id="star4" name="rating" value="4"
                                {{ $rating == 4 ? 'checked' : '' }} /><label for="star4"></label>
                            <input type="radio" id="star3" name="rating" value="3"
                                {{ $rating == 3 ? 'checked' : '' }} /><label for="star3"></label>
                            <input type="radio" id="star2" name="rating" value="2"
                                {{ $rating == 2 ? 'checked' : '' }} /><label for="star2"></label>
                            <input type="radio" id="star1" name="rating" value="1"
                                {{ $rating == 1 ? 'checked' : '' }} /><label for="star1"></label>
                        </div>
                    </form>
                    <div class="row">
                        <div class="col-sm-6">
                            <button form="quitar" type="submit" class="btn btn-secondary">Quitar</button>
                        </div>
                        <div class="col-sm-6">
                            <button form="calificar" type="submit" class="btn btn-primary">Calificar</button>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-12 text-center">
                            <a href="{{ route('tools') }}" class="btn btn-warning">Volver al Menu</a>
                        </div>
                    </div>
                    <form id="quitar" method="POST" action="{{ route('rate3') }}">
                        @csrf
                        <input type="hidden" name="rating" value="">
                    </form>
                </div>
                <div class="input-container col-2">
                    <label for="function">Función:</label>
                    <select id="function">
                        <option value="sin">Seno</option>
                        <option value="cos">Coseno</option>
                        <option value="tan">Tangente</option>
                    </select>
                </div>
                <div class="input-container col-2">
                    <label for="amplitude">Amplitud:</label>
                    <input type="number" id="amplitude" value="1" min="0">
                </div>
                <div class="input-container col-2">
                    <label for="period">Periodo:</label>
                    <input type="number" id="period" value="2" min="0">
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div id="trigFunctionContainer"></div>
        </div>
    </div>
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
    <style>
        /* Resto de tu código */
        #guidePanel {
            margin-top: 10px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .rating>input {
            display: none;
        }

        .rating>label {
            display: inline-block !important;
            padding: 0 5px !important;
            position: relative !important;
            cursor: pointer !important;
            font-size: 30px !important;
        }

        .rating>label:before {
            content: "\2605" !important;
            opacity: 0.5 !important;
        }

        .rating>label:hover:before,
        .rating>label:hover~label:before,
        .rating>input:checked~label:before {
            color: gold !important;
        }
    </style>
@endsection
