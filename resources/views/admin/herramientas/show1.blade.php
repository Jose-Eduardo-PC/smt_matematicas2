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
                <div class="col-4">
                    <div style="display: flex; justify-content: space-between; width: 200px;">
                        <button class="btn btn-info" onclick="addField()" style="font-size: 12px; border-radius: 12px;"><i
                                class="fas fa-plus"></i></button>
                        <button class="btn btn-info" onclick="clearFields()" style="font-size: 12px; border-radius: 12px;"><i
                                class="fas fa-trash"></i></button>
                    </div>
                    <br>
                    <div id="inputFields"></div>
                    <div>
                        <button class="btn btn-info" onclick="plot()"
                            style="font-size: 12px; border-radius: 12px;">Graficar</button>
                    </div>
                    <br>
                    <button class="btn btn-info" onclick="togglePanel()">Mostrar/Ocultar Guía</button>
                    <div id="guidePanel"
                        style="display: none; margin-top: 20px; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
                        <h2 style="color: #333;">Guía de Funciones</h2>
                        <h3 style="color: #666;">Funciones Polinómicas:</h3>
                        <ul>
                            <li><b>Funciones lineales:</b> y = mx + b (por ejemplo, y = 2x + 1)</li>
                            <li><b>Funciones cuadráticas:</b> y = ax^2 + bx + c (por ejemplo, y = 3x^2 + 2x + 1)</li>
                            <li><b>Funciones cúbicas:</b> y = ax^3 + bx^2 + cx + d (por ejemplo, y = 4x^3 + 3x^2 + 2x +
                                1)</li>
                        </ul>

                        <h3 style="color: #666;">Funciones Trigonométricas:</h3>
                        <ul>
                            <li><b>Seno (sin):</b> sin(x)</li>
                            <li><b>Coseno (cos):</b> cos(x)</li>
                            <li><b>Tangente (tan):</b> tan(x)</li>
                            <li><b>Cotangente (cotan):</b> 1/tan(x)</li>
                            <li><b>Arcoseno (asin):</b> asin(x)</li>
                            <li><b>Arcocoseno (acos):</b> acos(x)</li>
                            <li><b>Arcotangente (atan):</b> atan(x)</li>
                        </ul>
                    </div>
                </div>
                <div class="col-8">
                    <div id="myDiv"></div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        function togglePanel() {
            var panel = document.getElementById("guidePanel");
            if (panel.style.display === "none") {
                panel.style.display = "block";
            } else {
                panel.style.display = "none";
            }
        }
        // Resto de tu código
    </script>
    <script>
        var fieldCount = 0;
        var colors = ['rgb(0, 102, 255)', 'rgb(236, 99, 45)', 'rgb(26, 129, 16)', 'rgb(255, 0, 0)', 'rgb(0, 255, 0)',
            'rgb(0, 0, 255)'
        ];

        function addField() {
            var inputFields = document.getElementById("inputFields");
            var newField = document.createElement("input");
            newField.type = "text";
            newField.id = "equation" + fieldCount;
            newField.placeholder = "ecuación " + (fieldCount + 1);
            newField.style.marginBottom = "10px"; // Agrega un espacio debajo del campo de entrada

            var newLabel = document.createElement("span");
            newLabel.innerHTML = "F" + (fieldCount + 1);
            newLabel.style.color = colors[fieldCount % colors
                .length]; // Asigna el color del texto al mismo color que la línea del gráfico
            newLabel.style.marginRight = "10px"; // Agrega un espacio a la derecha del texto

            inputFields.appendChild(newLabel);
            inputFields.appendChild(newField);
            inputFields.appendChild(document.createElement("br"));
            fieldCount++;
        }

        function clearFields() {
            var inputFields = document.getElementById("inputFields");
            while (inputFields.firstChild) {
                inputFields.removeChild(inputFields.firstChild);
            }
            fieldCount = 0;
        }

        function plot() {
            var xValues = [];
            var traces = [];
            for (var i = 0; i < fieldCount; i++) {
                var equation = document.getElementById("equation" + i).value;
                var yValues = [];
                for (var x = -100; x < 100; x += 0.01) { // Aumenta la resolución de los datos
                    if (i === 0) {
                        xValues.push(x);
                    }
                    yValues.push(math.evaluate(equation, {
                        x: x
                    }));
                }
                var trace = {
                    x: xValues,
                    y: yValues,
                    type: 'scatter',
                    name: 'Función ' + (i + 1),
                    line: {
                        color: colors[i % colors.length]
                    },
                    hovertemplate: 'x: %{x}<br>y: %{y}<extra></extra>' // Agrega un hoverlabel
                };
                traces.push(trace);
            }
            var layout = {
                title: 'Gráfico de las Funciones',
                xaxis: {
                    title: '< - -x- - >',
                    range: [-50, 50],
                    gridcolor: 'rgb(200, 200, 200)', // Agrega una cuadrícula al gráfico
                    zerolinewidth: 1,
                    zerolinecolor: 'rgb(200, 200, 200)',
                    linecolor: 'rgb(200, 200, 200)',
                    linecolor: 'rgb(0, 0, 0)', // Cambia el color de la línea a negro
                    linewidth: 2,
                    zerolinecolor: 'rgb(255, 0, 0)', // Cambia el color de la línea central a rojo
                },
                yaxis: {
                    title: '< - -y- - >',
                    scaleanchor: 'x',
                    scaleratio: 1,
                    range: [-50, 50],
                    gridcolor: 'rgb(200, 200, 200)', // Agrega una cuadrícula al gráfico
                    zerolinewidth: 1,
                    zerolinecolor: 'rgb(200, 200, 200)',
                    linecolor: 'rgb(200, 200, 200)',
                    linecolor: 'rgb(0, 0, 0)', // Cambia el color de la línea a negro
                    linewidth: 2,
                    zerolinecolor: 'rgb(255, 0, 0)', // Cambia el color de la línea central a rojo
                },
                autosize: false,
                width: 600,
                height: 600
            };

            Plotly.newPlot('myDiv', traces, layout);
        }

        window.onload = addField;
    </script>
@endsection
@section('css')
    <style>
        input[type="text"] {
            border-radius: 5px;
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
    </style>
@endsection
