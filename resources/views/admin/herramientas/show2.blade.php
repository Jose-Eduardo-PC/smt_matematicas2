@extends('layouts.user')

<head>
    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
    <title>Calculadora de Triángulos</title>
</head>

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row ">
                <div class="col-xl-3">
                    <label for="sideA">Lado a:</label>
                    <input type="number" id="sideA"><br><br>

                    <label for="sideB">Lado b:</label>
                    <input type="number" id="sideB"><br><br>

                    <label for="sideC">Lado c:</label>
                    <input type="number" id="sideC"><br><br>

                    <label for="angleA">Ángulo A:</label>
                    <input type="number" id="angleA"><br><br>

                    <label for="angleB">Ángulo B:</label>
                    <input type="number" id="angleB"><br><br>

                    <label for="angleC">Ángulo C:</label>
                    <input type="number" id="angleC"><br><br>

                    <div class="button-container">
                        <button class="btn btn-info" onclick="plot()">Graficar</button>
                        <button class="btn btn-info" onclick="toggleExampleImage()">Ejemplo</button>
                    </div>
                </div>
                <div class="col-xl-9" id="myDiv"></div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        let isImageVisible = false;

        function toggleExampleImage() {
            if (isImageVisible) {
                hideExampleImage();
            } else {
                showExampleImage();
            }
            isImageVisible = !isImageVisible;
        }

        function showExampleImage() {
            let img = document.createElement("img");
            img.src = "/storage/imagenes/Triangulo_Ejemplo.png";
            img.id = "example-image";
            document.body.appendChild(img);
        }

        function hideExampleImage() {
            let img = document.getElementById("example-image");
            if (img) {
                img.parentNode.removeChild(img);
            }
        }

        function plot() {
            var sideB = parseFloat(document.getElementById("sideB").value);
            var sideA = parseFloat(document.getElementById("sideA").value);
            var sideC = parseFloat(document.getElementById("sideC").value);
            var angleA = parseFloat(document.getElementById("angleA").value) * (Math.PI / 180);
            var angleB = parseFloat(document.getElementById("angleB").value) * (Math.PI / 180);
            var angleC = parseFloat(document.getElementById("angleC").value) * (Math.PI / 180);

            if (sideA && sideB && angleC) {
                sideC = Math.sqrt(sideA * sideA + sideB * sideB - 2 * sideA * sideB * Math.cos(angleC));
                angleA = Math.asin(sideB * Math.sin(angleC) / sideC);
                angleB = Math.PI - angleA - angleC;
            } else if (sideA && sideC && angleB) {
                sideB = Math.sqrt(sideA * sideA + sideC * sideC - 2 * sideA * sideC * Math.cos(angleB));
                angleA = Math.asin(sideC * Math.sin(angleB) / sideB);
                angleC = Math.PI - angleA - angleB;
            } else if (sideB && sideC && angleA) {
                sideA = Math.sqrt(sideB * sideB + sideC * sideC - 2 * sideB * sideC * Math.cos(angleA));
                angleB = Math.asin(sideC * Math.sin(angleA) / sideA);
                angleC = Math.PI - angleA - angleB;
            }

            var xValues = [0, sideC, sideA * Math.cos(angleB), 0];
            var yValues = [0, 0, sideA * Math.sin(angleB), 0];

            var trace1 = {
                x: xValues,
                y: yValues,
                type: 'scatter',
                mode: 'lines+markers',
                fill: 'toself'
            };

            var trace2 = {
                x: [sideC / 2, sideA * Math.cos(angleB) / 2 + sideC / 2, sideA * Math.cos(angleB) / 2],
                y: [-0.5, -0.5 + sideA * Math.sin(angleB) / 2, sideA * Math.sin(angleB) / 2 + 0.5],
                text: ['Lado C: ' + sideC.toFixed(2), 'Lado A: ' + sideA.toFixed(2), 'Lado B: ' + sideB.toFixed(2)],
                mode: 'text'
            };

            var trace3 = {
                x: [0.5, sideC - 0.5, sideA * Math.cos(angleB) + 0.5],
                y: [0.5, 0.5, sideA * Math.sin(angleB) - 0.5],
                text: ['Ángulo A: ' + (angleA * (180 / Math.PI)).toFixed(2) + '°', 'Ángulo B: ' + (angleB * (180 / Math
                    .PI)).toFixed(2) + '°', 'Ángulo C: ' + (angleC * (180 / Math.PI)).toFixed(2) + '°'],
                mode: 'text'
            };

            var data = [trace1, trace2, trace3];

            var layout = {
                title: 'Gráfico de las funciones',
                xaxis: {
                    title: 'x'
                },
                yaxis: {
                    title: 'y',
                    scaleanchor: 'x'
                }
            };

            Plotly.newPlot('myDiv', data, layout);
        }
    </script>
@endsection

@section('css')
    <style>
        .button-container button {
            display: inline-block;
            margin: 5px;
        }

        input[type="number"] {
            border-radius: 5px;
        }

        label {
            display: inline-block;
            width: 80px;
        }

        #example-image {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            max-width: 30%;
            height: auto;
        }
    </style>
@endsection
