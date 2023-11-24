@extends('layouts.user')

<head>
    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
    <title>Calculadora de Triángulos</title>
</head>

@section('content')
    <div class="card">
        <div class="card-body">
            <form id="calificar" method="POST" action="{{ route('rate4') }}">
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
            <div>
                <button form="quitar" type="submit" class="btn btn-secondary">Quitar</button>
                <button form="calificar" type="submit" class="btn btn-primary">Calificar</button>
                <a href="{{ route('tools') }}" class="btn btn-warning">Volver al Menu</a>
            </div>
            <form id="quitar" method="POST" action="{{ route('rate4') }}">
                @csrf
                <input type="hidden" name="rating" value="">
            </form>
            <div class="row">
                <div class="col-6">
                    <div class="row">
                        <div class="col-6">
                            <form>
                                <label for="ladoA">Lado a:</label>
                                <input type="number" id="ladoA" name="ladoA"><br><br>
                                <label for="ladoB">Lado b:</label>
                                <input type="number" id="ladoB" name="ladoB"><br><br>
                                <label for="ladoC">Lado c:</label>
                                <input type="number" id="ladoC" name="ladoC"><br><br>
                            </form>
                        </div>
                        <div class="col-6">
                            <form>
                                <label for="anguloA">Ángulo A:</label>
                                <input type="number" id="anguloA" name="anguloA"><br><br>
                                <label for="anguloB">Ángulo B:</label>
                                <input type="number" id="anguloB" name="anguloB"><br><br>
                                <label for="anguloC">Ángulo C:</label>
                                <input type="number" id="anguloC" name="anguloC"><br><br>
                            </form>
                        </div>
                    </div>
                    <button class="btn-azul" onclick="resolverTriangulo()">Resolver Triángulo</button>
                    <br><br>
                    <p class="p1" id="metodoResolucion"></p>
                    <div class="row">
                        <div class="col-6">
                            <p id="resultado-lados"> </p>
                        </div>
                        <div class="col-6">
                            <p id="resultado-angulos"> </p>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <img class="imgtri" src="storage/imagenes/imagen-cosenos.webp" alt="hubo algun error">
                </div>
            </div>
            <div id="myDiv"></div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        //funcional
        function resolverTriangulo() {
            const ladoA = parseFloat(document.getElementById("ladoA").value);
            const ladoB = parseFloat(document.getElementById("ladoB").value);
            const ladoC = parseFloat(document.getElementById("ladoC").value);
            const anguloA = parseFloat(document.getElementById("anguloA").value);
            const anguloB = parseFloat(document.getElementById("anguloB").value);
            const anguloC = parseFloat(document.getElementById("anguloC").value);

            const mensajeError = validarDatos(ladoA, ladoB, ladoC, anguloA, anguloB, anguloC);

            if (mensajeError) {
                document.getElementById("metodoResolucion").textContent = "Error: " + mensajeError;
                document.getElementById("metodoResolucion").classList.add("error");
                return;
            }

            const valoresIngresados = [];
            if (!isNaN(ladoA)) valoresIngresados.push("ladoA");
            if (!isNaN(ladoB)) valoresIngresados.push("ladoB");
            if (!isNaN(ladoC)) valoresIngresados.push("ladoC");
            if (!isNaN(anguloA)) valoresIngresados.push("anguloA");
            if (!isNaN(anguloB)) valoresIngresados.push("anguloB");
            if (!isNaN(anguloC)) valoresIngresados.push("anguloC");

            let metodoResolucion = "";

            if (valoresIngresados.length >= 3) {
                if (valoresIngresados.includes("ladoA") && valoresIngresados.includes("ladoB") && valoresIngresados
                    .includes("ladoC")) {
                    // Resolver el triángulo con Teorema del Coseno.
                    metodoResolucion = "Teorema del coseno";
                    resolverTrianguloConLeyDeCosenos();
                } else if (valoresIngresados.includes("ladoA") && valoresIngresados.includes("anguloB") && valoresIngresados
                    .includes("anguloC")) {
                    // Resolver el triángulo con Teorema del Seno y Ley de Cosenos.
                    metodoResolucion = "Teorema del seno / Ley de cosenos";
                    resolverTrianguloConSenoYCoseno2();
                } else if (valoresIngresados.includes("ladoB") && valoresIngresados.includes("anguloA") && valoresIngresados
                    .includes("anguloC")) {
                    // Resolver el triángulo con Teorema del Seno y Ley de Cosenos.
                    metodoResolucion = "Teorema del seno / Ley de cosenos";
                    resolverTrianguloConSenoYCoseno();
                } else if (valoresIngresados.includes("ladoC") && valoresIngresados.includes("anguloA") && valoresIngresados
                    .includes("anguloB")) {
                    // Resolver el triángulo con Teorema del Seno y Ley de Cosenos.
                    metodoResolucion = "Teorema del seno / Ley de cosenos";
                    resolverTrianguloConSenoYCoseno3();
                } else if ((valoresIngresados.includes("ladoA") || valoresIngresados.includes("ladoB") || valoresIngresados
                        .includes("ladoC")) &&
                    (valoresIngresados.includes("anguloA") || valoresIngresados.includes("anguloB") || valoresIngresados
                        .includes("anguloC"))) {
                    if (valoresIngresados.includes("ladoA") && valoresIngresados.includes("ladoB") && valoresIngresados
                        .includes("anguloC")) {
                        // Resolver el triángulo con dos lados y un ángulo.
                        metodoResolucion = "Teorema del seno / Ley de cosenos lA-lB-AC";
                        resolverTrianguloConDosLadosYAngulo();
                    } else if (valoresIngresados.includes("ladoB") && valoresIngresados.includes("ladoC") &&
                        valoresIngresados
                        .includes("anguloA")) {
                        metodoResolucion = "Teorema del seno / Ley de cosenos lB-lC-aA";
                        resolverTrianguloConDosLadosYAngulo2();
                    }
                } else {
                    metodoResolucion = "No se puede determinar un método único";
                }
            } else {
                metodoResolucion = "Faltan datos para resolver el triángulo";
            }
            document.getElementById("metodoResolucion").classList.remove("error");
            document.getElementById("metodoResolucion").textContent = "Método de resolución: " + metodoResolucion;
            document.getElementById("metodoResolucion").classList.add("destacado-fondo");
        }
        //funcional
        function validarDatos(ladoA, ladoB, ladoC, anguloA, anguloB, anguloC) {
            if ((isNaN(ladoA) && isNaN(anguloA)) || (isNaN(ladoB) && isNaN(anguloB)) || (isNaN(ladoC) && isNaN(anguloC))) {
                return "Al menos un lado o un ángulo deben estar presentes para resolver el triángulo. Esto garantiza la consistencia y validez de los datos.";
            }

            if (!isNaN(anguloA) && (anguloA <= 0 || anguloA >= 180)) {
                return "El ángulo A debe estar en el rango de 0 a 180 grados.";
            }

            if (!isNaN(anguloB) && (anguloB <= 0 || anguloB >= 180)) {
                return "El ángulo B debe estar en el rango de 0 a 180 grados.";
            }

            if (!isNaN(anguloC) && (anguloC <= 0 || anguloC >= 180)) {
                return "El ángulo C debe estar en el rango de 0 a 180 grados.";
            }

            if (!isNaN(anguloA) && !isNaN(anguloB) && !isNaN(anguloC) && anguloA + anguloB + anguloC !== 180) {
                return "La suma de los ángulos debe ser igual a 180 grados.";
            }

            if (!isNaN(ladoA) && ladoA <= 0) {
                return "El lado A debe ser un valor positivo.";
            }

            if (!isNaN(ladoB) && ladoB <= 0) {
                return "El lado B debe ser un valor positivo.";
            }

            if (!isNaN(ladoC) && ladoC <= 0) {
                return "El lado C debe ser un valor positivo.";
            }

            // Otras validaciones si es necesario...

            return null;
        }
        //funcional
        function resolverTrianguloConLeyDeCosenos() {
            // Obtener los valores de los campos del formulario
            var ladoA = document.getElementById('ladoA').value;
            var ladoB = document.getElementById('ladoB').value;
            var ladoC = document.getElementById('ladoC').value;

            // Convertir los valores a números
            var a = parseFloat(ladoA);
            var b = parseFloat(ladoB);
            var c = parseFloat(ladoC);

            // Calcular el ángulo C utilizando la ley de cosenos
            var C = Math.acos((a * a + b * b - c * c) / (2 * a * b));

            // Calcular el ángulo A utilizando el teorema del seno
            var A = Math.asin(a * Math.sin(C) / c);

            // Calcular el ángulo B restando la suma de los ángulos A y C a 180°
            var B = Math.PI - A - C;

            // Convertir los ángulos a grados
            A = A * 180 / Math.PI;
            B = B * 180 / Math.PI;
            C = C * 180 / Math.PI;

            // Redondear los valores a tres decimales
            a = a.toFixed(3);
            b = b.toFixed(3);
            c = c.toFixed(3);
            A = A.toFixed(3);
            B = B.toFixed(3);
            C = C.toFixed(3);


            // Asignar los valores calculados al elemento <p id="resultado"></p>
            document.getElementById('resultado-lados').innerHTML =
                'Lado a: ' + a + '<br>' +
                'Lado b: ' + b + '<br>' +
                'Lado c: ' + c;
            document.getElementById('resultado-angulos').innerHTML =
                'Ángulo A: ' + A + '<br>' +
                'Ángulo B: ' + B + '<br>' +
                'Ángulo C: ' + C;
            dibujarTriangulo(a, b, c, A, B, C);
        }
        //funcional
        function resolverTrianguloConSenoYCoseno() {
            // Obtener los valores de los campos del formulario
            var ladoB = document.getElementById('ladoB').value;
            var anguloA = document.getElementById('anguloA').value;
            var anguloC = document.getElementById('anguloC').value;
            // Convertir los valores a números
            var b = parseFloat(ladoB);
            var A = parseFloat(anguloA);
            var C = parseFloat(anguloC);

            // Convierte los ángulos a radianes
            A = A * (Math.PI / 180);
            C = C * (Math.PI / 180);

            // Calcula el ángulo B utilizando el Teorema de la Suma de Ángulos
            let B = Math.PI - A - C;

            // Calcula el lado a utilizando el Teorema del Seno
            let a = (b * Math.sin(A)) / Math.sin(B);

            // Calcula el lado c utilizando la Ley de los Cosenos
            let c = Math.sqrt(a * a + b * b - 2 * a * b * Math.cos(C));

            // Convierte los ángulos a grados y redondea a 3 decimales
            A = Number((A * (180 / Math.PI)).toFixed(3));
            B = Number((B * (180 / Math.PI)).toFixed(3));
            C = Number((C * (180 / Math.PI)).toFixed(3));

            // Redondea los lados a 3 decimales
            a = Number(a.toFixed(3));
            b = Number(b.toFixed(3));
            c = Number(c.toFixed(3));

            // Asignar los valores calculados al elemento <p id="resultado"></p>
            document.getElementById('resultado-lados').innerHTML =
                'Lado a: ' + a + '<br>' +
                'Lado b: ' + b + '<br>' +
                'Lado c: ' + c;
            document.getElementById('resultado-angulos').innerHTML =
                'Ángulo A: ' + A + '<br>' +
                'Ángulo B: ' + B + '<br>' +
                'Ángulo C: ' + C;
            dibujarTriangulo(a, b, c, A, B, C);
        }
        //funcional
        function resolverTrianguloConSenoYCoseno2() {
            // Obtener los valores de los campos del formulario
            var ladoA = document.getElementById('ladoA').value;
            var anguloB = document.getElementById('anguloB').value;
            var anguloC = document.getElementById('anguloC').value;

            // Convertir los valores a números
            var a = parseFloat(ladoA);
            var B = parseFloat(anguloB);
            var C = parseFloat(anguloC);

            // Convierte los ángulos a radianes
            B = B * (Math.PI / 180);
            C = C * (Math.PI / 180);

            // Calcula el ángulo A utilizando el Teorema de la Suma de Ángulos
            let A = Math.PI - B - C;

            // Calcula el lado b utilizando el Teorema del Seno
            let b = (a * Math.sin(B)) / Math.sin(A);

            // Calcula el lado c utilizando la Ley de los Cosenos
            let c = Math.sqrt(a * a + b * b - 2 * a * b * Math.cos(C));

            // Convierte los ángulos a grados y redondea a 3 decimales
            A = Number((A * (180 / Math.PI)).toFixed(3));
            B = Number((B * (180 / Math.PI)).toFixed(3));
            C = Number((C * (180 / Math.PI)).toFixed(3));

            // Redondea los lados a 3 decimales
            a = Number(a.toFixed(3));
            b = Number(b.toFixed(3));
            c = Number(c.toFixed(3));

            // Asignar los valores calculados al elemento <p id="resultado"></p>
            document.getElementById('resultado-lados').innerHTML =
                'Lado a: ' + a + '<br>' +
                'Lado b: ' + b + '<br>' +
                'Lado c: ' + c;
            document.getElementById('resultado-angulos').innerHTML =
                'Ángulo A: ' + A + '<br>' +
                'Ángulo B: ' + B + '<br>' +
                'Ángulo C: ' + C;
            dibujarTriangulo(a, b, c, A, B, C);
        }
        //funcional
        function resolverTrianguloConSenoYCoseno3() {
            // Obtener los valores de los campos del formulario
            var ladoC = document.getElementById('ladoC').value;
            var anguloA = document.getElementById('anguloA').value;
            var anguloB = document.getElementById('anguloB').value;

            // Convertir los valores a números
            var c = parseFloat(ladoC);
            var A = parseFloat(anguloA);
            var B = parseFloat(anguloB);

            // Convierte los ángulos a radianes
            A = A * (Math.PI / 180);
            B = B * (Math.PI / 180);

            // Calcula el ángulo C utilizando el Teorema de la Suma de Ángulos
            let C = Math.PI - A - B;

            // Calcula el lado a utilizando el Teorema del Seno
            let a = (c * Math.sin(A)) / Math.sin(C);

            // Calcula el lado b utilizando la Ley de los Cosenos
            let b = Math.sqrt(a * a + c * c - 2 * a * c * Math.cos(B));

            // Convierte los ángulos a grados y redondea a 3 decimales
            A = Number((A * (180 / Math.PI)).toFixed(3));
            B = Number((B * (180 / Math.PI)).toFixed(3));
            C = Number((C * (180 / Math.PI)).toFixed(3));

            // Redondea los lados a 3 decimales
            a = Number(a.toFixed(3));
            b = Number(b.toFixed(3));
            c = Number(c.toFixed(3));

            // Asignar los valores calculados al elemento <p id="resultado"></p>
            document.getElementById('resultado-lados').innerHTML =
                'Lado a: ' + a + '<br>' +
                'Lado b: ' + b + '<br>' +
                'Lado c: ' + c;
            document.getElementById('resultado-angulos').innerHTML =
                'Ángulo A: ' + A + '<br>' +
                'Ángulo B: ' + B + '<br>' +
                'Ángulo C: ' + C;
            dibujarTriangulo(a, b, c, A, B, C);
        }
        //funcional
        function resolverTrianguloConDosLadosYAngulo() {
            // Obtener los valores de los lados y ángulos desde tus variables o campos
            const ladoA = parseFloat(document.getElementById("ladoA").value);
            const ladoB = parseFloat(document.getElementById("ladoB").value);
            const anguloC = parseFloat(document.getElementById("anguloC").value);
            // Convertir el ángulo de grados a radianes
            const anguloCRad = anguloC * (Math.PI / 180);

            // Calcular el tercer lado usando la Ley de los Cosenos
            const ladoC = Math.sqrt(ladoA ** 2 + ladoB ** 2 - 2 * ladoA * ladoB * Math.cos(anguloCRad));

            // Calcular los otros ángulos
            const anguloA = Math.asin(ladoA * Math.sin(anguloCRad) / ladoC) * (180 / Math.PI);
            const anguloB = 180 - anguloC - anguloA;

            a = ladoA.toFixed(3);
            b = ladoB.toFixed(3);
            c = ladoC.toFixed(3);
            A = anguloA.toFixed(3);
            B = anguloB.toFixed(3);
            C = anguloC.toFixed(3);

            // Asignar los valores calculados al elemento <p id="resultado"></p>
            document.getElementById('resultado-lados').innerHTML =
                'Lado a: ' + a + '<br>' +
                'Lado b: ' + b + '<br>' +
                'Lado c: ' + c;
            document.getElementById('resultado-angulos').innerHTML =
                'Ángulo A: ' + A + '<br>' +
                'Ángulo B: ' + B + '<br>' +
                'Ángulo C: ' + C;
            // Aquí puedes utilizar bibliotecas de gráficos para dibujar el triángulo
            dibujarTriangulo(a, b, c, A, B, C);
        }

        function resolverTrianguloConDosLadosYAngulo2() {
            // Obtener los valores de los lados y ángulos desde tus variables o campos
            const ladoB = parseFloat(document.getElementById("ladoB").value);
            const ladoC = parseFloat(document.getElementById("ladoC").value);
            const anguloA = parseFloat(document.getElementById("anguloA").value);
            // Convertir el ángulo de grados a radianes
            const anguloARad = anguloA * (Math.PI / 180);

            // Calcular el tercer lado usando la Ley de los Cosenos
            const ladoA = Math.sqrt(ladoB ** 2 + ladoC ** 2 - 2 * ladoB * ladoC * Math.cos(anguloARad));

            // Calcular los otros ángulos
            const anguloB = Math.asin(ladoB * Math.sin(anguloARad) / ladoA) * (180 / Math.PI);
            const anguloC = 180 - anguloA - anguloB;

            a = ladoA.toFixed(3);
            b = ladoB.toFixed(3);
            c = ladoC.toFixed(3);
            A = anguloA.toFixed(3);
            B = anguloB.toFixed(3);
            C = anguloC.toFixed(3);

            // Asignar los valores calculados al elemento <p id="resultado"></p>
            document.getElementById('resultado-lados').innerHTML =
                'Lado a: ' + a + '<br>' +
                'Lado b: ' + b + '<br>' +
                'Lado c: ' + c;
            document.getElementById('resultado-angulos').innerHTML =
                'Ángulo A: ' + A + '<br>' +
                'Ángulo B: ' + B + '<br>' +
                'Ángulo C: ' + C;
            // Aquí puedes utilizar bibliotecas de gráficos para dibujar el triángulo
            dibujarTriangulo(a, b, c, A, B, C);
        }

        function dibujarTriangulo(a, b, c, A, B, C) {

            var a = parseFloat(a);
            var b = parseFloat(b);
            var c = parseFloat(c);
            var A = parseFloat(A);
            var B = parseFloat(B);
            var C = parseFloat(C);

            var s = (a + b + c) / 2;
            var area = Math.sqrt(s * (s - a) * (s - b) * (s - c));
            var areaTexto = 'Área: ' + area.toFixed(2) + ' cm²';

            var x1 = 0;
            var y1 = 0;
            var x2 = a;
            var y2 = 0;
            var x3 = b * Math.cos(C * Math.PI / 180);
            var y3 = b * Math.sin(C * Math.PI / 180);

            var tempX = x1;
            var tempY = y1;
            x1 = x3;
            y1 = y3;
            x3 = tempX;
            y3 = tempY;

            var centroidX = (x1 + x2 + x3) / 3;
            var centroidY = (y1 + y2 + y3) / 3;

            var anguloA = {
                x: [x1 + 0.1],
                y: [y1 + 0.4],
                mode: 'text',
                name: 'angulo A',
                text: ['A'],
                textposition: 'bottom left',
                textfont: {
                    size: 18
                }
            };

            var anguloB = {
                x: [x2 + 0.3],
                y: [y2 + 0.2],
                mode: 'text',
                name: 'angulo B',
                text: ['B'],
                textposition: 'bottom rigt',
                textfont: {
                    size: 18
                }
            };

            var anguloC = {
                x: [x3 - 0.3],
                y: [y3 - 0.2],
                mode: 'text',
                name: 'angulo C',
                text: ['C'],
                textposition: 'top center',
                textfont: {
                    size: 18
                }
            };

            var ladoA = {
                x: [(x2 + x3) / 2],
                y: [(y2 + y3) / 2],
                mode: 'text',
                text: ['a'],
                name: 'lado A',
                textposition: 'top center',
                textfont: {
                    size: 18
                }
            };

            var ladoB = {
                x: [((x1 + x3) / 2) - 0.2],
                y: [(y1 + y3) / 2],
                mode: 'text',
                name: 'lado B',
                text: ['b'],
                textposition: 'bottom left',
                textfont: {
                    size: 18
                }
            };

            var ladoC = {
                x: [((x1 + x2) / 2) + 0.2],
                y: [(y1 + y2) / 2],
                mode: 'text',
                name: 'lado C',
                text: ['c'],
                textposition: 'bottom right',
                textfont: {
                    size: 18
                }
            };

            var trace1 = {
                x: [x1, x2, x3, x1],
                y: [y1, y2, y3, y1],
                mode: 'lines',
                name: 'Triángulo',
                line: {
                    color: 'rgb(0, 0, 255)',
                    width: 3
                }
            };

            var trace2 = {
                x: [x1, x2, x3, centroidX],
                y: [y1, y2, y3, centroidY],
                mode: 'markers+text',
                name: 'Puntos d Ref',
                text: ['', '', '', areaTexto],
                textposition: 'bottom center',
                textfont: {
                    size: 20
                },
                marker: {
                    size: 10,
                    color: 'rgb(255, 0, 0)'
                }
            };

            var data = [trace1, trace2];

            var layout = {
                title: 'Triángulo',
                xaxis: {
                    range: [-1, Math.max(a, b) + 1]
                },
                yaxis: {
                    scaleanchor: "x",
                    scaleratio: 1
                },
                legend: {
                    title: {
                        text: 'Leyendas'
                    },
                    x: 1.02,
                    y: 0.5,
                    valign: 'middle',
                    bgcolor: 'rgba(255, 255, 255, 0.8)',
                    bordercolor: 'blue',
                    borderwidth: 2,
                    font: {
                        size: 16
                    }
                }
            };
            var data = [trace1, trace2, anguloA, anguloB, anguloC, ladoA, ladoB, ladoC];
            Plotly.newPlot('myDiv', data, layout);
        }
    </script>
@endsection

@section('css')
    <style>
        .form-row {
            display: table;
        }

        .form-label,
        .form-input {
            display: table-cell;
            vertical-align: middle;
        }

        .imgtri {
            max-width: 70%;
            height: auto;
            display: block;
            margin: 0 auto;
        }

        .destacado-fondo {
            background-color: #073a7c;
            padding: 10px;
            border-radius: 10px;
            transition: background-color 0.3s;
        }

        .p1 {
            color: rgb(255, 255, 255);
        }

        p {
            font-weight: normal;
        }

        .btn-azul {
            color: white;
            background-color: skyblue;
            border: none;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            border-radius: 5px;
        }

        .error {
            background-color: red;
            font-size: 16px;
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
