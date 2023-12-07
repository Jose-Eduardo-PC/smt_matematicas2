@extends('layouts.user')

<head>
    <title>Funciones trigonometricas</title>
</head>
@section('content')
    <!-- Modal: Seno y Cosecante -->
    <div class="modal-background" id="modal1-background">
        <div class="modal" id="modal1">
            <span class="close-button" data-modal="modal1">×</span>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <h2>Funciones de Seno y Cosecante</h2>
                            <p>El seno de un ángulo es la longitud del cateto opuesto dividida entre la longitud de la
                                hipotenusa. La cosecante es el recíproco del seno.</p>
                        </div>
                        <div class="col-6">
                            <div>
                                <h2>Calcular Seno o Cosecante</h2>
                                <p>Nota: usar punto para indicar los decimales</p>
                                <form id="formsin">
                                    <select id="operationsin" name="operation">
                                        <option value="angles">Calcular Ángulo</option>
                                        <option value="sin">Calcular Seno</option>
                                        <option value="cosec">Calcular Cosecante</option>
                                    </select>
                                    <br><br>
                                    <label for="value">Valor:</label>
                                    <input type="text" id="valuesin" name="value">
                                    <input type="submit" value="Calcular">
                                </form>
                                <p class="fw-bolder" id="messagesin"></p>
                                <h4 class="fw-bolder" id="resultsin"></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal: Coseno y Secante -->
    <div class="modal-background" id="modal2-background">
        <div class="modal" id="modal2">
            <span class="close-button" data-modal="modal2">×</span>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <h2>Funciones de Coseno y Secante</h2>
                            <p>El coseno de un ángulo es la longitud del cateto adyacente dividida entre la longitud de la
                                hipotenusa. La secante es el recíproco del coseno.</p>
                        </div>
                        <div class="col-6">
                            <div>
                                <h2>Calcular Coseno o Secante</h2>
                                <p>Nota: usar punto para indicar los decimales</p>
                                <form id="formcos">
                                    <select id="operationcos" name="operation">
                                        <option value="anglec">Calcular Ángulo</option>
                                        <option value="cos">Calcular Coseno</option>
                                        <option value="sec">Calcular Secante</option>
                                    </select>
                                    <br><br>
                                    <label for="value">Valor:</label>
                                    <input type="text" id="valuecos" name="value">
                                    <input type="submit" value="Calcular">
                                </form>
                                <p class="fw-bolder" id="messagecos"></p>
                                <h4 class="fw-bolder" id="resultcos"></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal: Tangente y Cotangente -->
    <div class="modal-background" id="modal3-background">
        <div class="modal" id="modal3">
            <span class="close-button" data-modal="modal3">×</span>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <h2>Funciones de Tangente y Cotangente</h2>
                            <p>La tangente de un ángulo es la longitud del cateto opuesto dividida entre la longitud del
                                cateto adyacente. La cotangente es el recíproco de la tangente.</p>
                        </div>
                        <div class="col-6">
                            <div>
                                <h2>Calcular Tangente o Cotangente</h2>
                                <p>Nota: usar punto para indicar los decimales</p>
                                <form id="formtan">
                                    <select id="operationtan" name="operation">
                                        <option value="anglet">Calcular Ángulo</option>
                                        <option value="tan">Calcular Tangente</option>
                                        <option value="cot">Calcular Cotangente</option>
                                    </select>
                                    <br><br>
                                    <label for="value">Valor:</label>
                                    <input type="text" id="valuetan" name="value">
                                    <input type="submit" value="Calcular">
                                </form>
                                <p class="fw-bolder" id="messagetan"></p>
                                <h4 class="fw-bolder" id="resultan"></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Calificacion -->
    <div class="card">
        <div class="card-body">
            <H2>Funciones trigonometricas</H2>
            <p>Por ejemplo, para el triángulo rectángulo en la imagen, tenemos las siguientes razones trigonométricas:</p>
            <form id="calificar" method="POST" action="{{ route('rate2') }}">
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
        </div>
    </div>
    <form id="quitar" method="POST" action="{{ route('rate2') }}">
        @csrf
        <input type="hidden" name="rating" value="">
    </form>
    <!-- Tabla -->
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <table class="table table-sm">
                        <thead class="thead-dark">
                            <tr>
                                <th></th>
                                <th class="text-light"><b>Ángulo α</b></th>
                                <th class="text-light"><b>Ángulo β</b></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="bold-text">Cateto opuesto (CO)</td>
                                <td>b</td>
                                <td>a</td>
                            </tr>
                            <tr>
                                <td class="bold-text">Cateto adyacente (CA)</td>
                                <td>a</td>
                                <td>b</td>
                            </tr>
                            <tr>
                                <td class="bold-text">Hipotenusa (H)</td>
                                <td>c</td>
                                <td>c</td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="table table-sm">
                        <thead class="thead-dark">
                            <tr>
                                <th></th>
                                <th class="text-light"><b>Ángulo α</b></th>
                                <th class="text-light"><b>Ángulo β</b></th>
                                <th class="text-light"><b>Herramienta</b></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="bold-text">Seno</td>
                                <td>CO/H=b/c</td>
                                <td>CO/H=a/c</td>
                                <td>
                                    <button class="open-modal-button btn btn-success btn-sm"
                                        data-modal="modal1">Seno</button>
                                </td>
                            </tr>
                            <tr>
                                <td class="bold-text">Coseno</td>
                                <td>CA/H=a/c</td>
                                <td>CA/H=b/c</td>
                                <td>
                                    <button class="open-modal-button btn btn-success btn-sm"
                                        data-modal="modal2">Coseno</button>
                                </td>
                            </tr>
                            <tr>
                                <td class="bold-text">Tangente</td>
                                <td>CO/CA=b/a</td>
                                <td>CO/CA=a/b</td>
                                <td>
                                    <button class="open-modal-button btn btn-success btn-sm"
                                        data-modal="modal3">Tangente</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-6" style="display: flex; justify-content: center; align-items: center; height: 400px;">
                    <img src="\storage\imagenes\pizarra_triangulo.jpg" alt="IMG" width="450" height="350">
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        function isValidNumber(value) {
            return !isNaN(value) && value !== '';
        }
        const openModalButtons = document.querySelectorAll('.open-modal-button');
        openModalButtons.forEach(button => {
            button.addEventListener('click', event => {
                const modalId = event.target.dataset.modal;
                document.getElementById(modalId).style.display = 'block';
                document.getElementById(modalId + '-background').style.display = 'block';
                console.log(modalId);
                if (modalId == "modal1") {
                    myFunctionSeno();
                } else if (modalId == "modal2") {
                    myFunctionCoseno();
                } else if (modalId == "modal3") {
                    myFunctionTangente();
                }
            });
        });

        function myFunctionSeno() {
            var operationElement = document.getElementById("operationsin");
            var messageElement = document.getElementById("messagesin");

            messageElement.innerHTML = operationElement.value === "angles" ?
                "Por favor, ingresa un valor de seno entre -1 y 1." :
                "Por favor, ingresa un ángulo en grados entre 0 y 360.";

            operationElement.addEventListener("change", function(event) {
                if (operationElement.value === "angles") {
                    messageElement.innerHTML = "Por favor, ingresa un valor de seno entre -1 y 1.";
                } else if (operationElement.value === "sin" || operationElement.value === "cosec") {
                    messageElement.innerHTML = "Por favor, ingresa un ángulo en grados entre 0 y 360.";
                }
                // Limpia el resultado cuando se cambia la operación
                document.getElementById("resultsin").innerHTML = "";
            });

            document.getElementById("formsin").addEventListener("submit", function(event) {
                event.preventDefault();
                var operation = operationElement.value;
                var value = document.getElementById("valuesin").value;

                if (!isValidNumber(value)) {
                    document.getElementById("resultsin").innerHTML = "Error: Por favor ingresa un número válido.";
                    return;
                }

                value = parseFloat(value);
                var result;
                if (operation === "angles") {
                    if (value >= -1 && value <= 1) {
                        result = Math.asin(value); // resultado en radianes
                        document.getElementById("resultsin").innerHTML = "Ángulo en radianes = " + result.toFixed(
                            3) + "<br>Ángulo en grados = " + (result * 180 / Math.PI).toFixed(3) + "°";
                    } else {
                        document.getElementById("resultsin").innerHTML =
                            "Error: El valor del seno debe estar entre -1 y 1.";
                    }
                } else if (operation === "sin") {
                    result = Math.sin(value * Math.PI / 180); // seno en grados
                    var resultRad = Math.sin(value); // seno en radianes
                    document.getElementById("resultsin").innerHTML = "Seno de " + value + "° = " + result.toFixed(
                        3) + "<br>Seno de " + value + " radianes = " + resultRad.toFixed(3);
                } else if (operation === "cosec") {
                    if (value !== 0) {
                        result = 1 / Math.sin(value * Math.PI / 180); // cosecante en grados
                        var resultRad = 1 / Math.sin(value); // cosecante en radianes
                        document.getElementById("resultsin").innerHTML = "Cosecante de " + value + "° = " + result
                            .toFixed(
                                3) + "<br>Cosecante de " + value + "° = " + " radianes = " + resultRad.toFixed(3);
                    } else {
                        document.getElementById("resultsin").innerHTML = "Cosecante = ∞";
                    }
                }
            });
        }

        function myFunctionCoseno() {
            var operationElement = document.getElementById("operationcos");
            var messageElement = document.getElementById("messagecos");

            messageElement.innerHTML = operationElement.value === "anglec" ?
                "Por favor, ingresa un valor de coseno entre -1 y 1." :
                "Por favor, ingresa un ángulo en grados entre 0 y 360.";

            operationElement.addEventListener("change", function(event) {
                if (operationElement.value === "anglec") {
                    messageElement.innerHTML = "Por favor, ingresa un valor de coseno entre -1 y 1.";
                } else if (operationElement.value === "cos" || operationElement.value === "sec") {
                    messageElement.innerHTML = "Por favor, ingresa un ángulo en grados entre 0 y 360.";
                }
                // Limpia el resultado cuando se cambia la operación
                document.getElementById("resultcos").innerHTML = "";
            });

            document.getElementById("formcos").addEventListener("submit", function(event) {
                event.preventDefault();
                var operation = operationElement.value;
                var value = document.getElementById("valuecos").value;

                if (!isValidNumber(value)) {
                    document.getElementById("resultcos").innerHTML = "Error: Por favor ingresa un número válido.";
                    return;
                }

                value = parseFloat(value);
                var result;
                if (operation === "anglec") {
                    if (value >= -1 && value <= 1) {
                        result = Math.acos(value); // resultado en radianes
                        document.getElementById("resultcos").innerHTML = "Ángulo en radianes = " + result.toFixed(
                                3) +
                            "<br>Ángulo en grados = " + (result * 180 / Math.PI).toFixed(3) + "°";
                    } else {
                        document.getElementById("resultcos").innerHTML =
                            "Error: El valor del coseno debe estar entre -1 y 1.";
                    }
                } else if (operation === "cos") {
                    result = Math.cos(value * Math.PI / 180); // coseno en grados
                    var resultRad = Math.cos(value); // coseno en radianes
                    document.getElementById("resultcos").innerHTML = "Coseno de " + value + "° = " + result.toFixed(
                        3) + "<br>Coseno de " + value + " radianes = " + resultRad.toFixed(3);
                } else if (operation === "sec") {
                    if (value !== 90 && value !== 270) {
                        result = 1 / Math.cos(value * Math.PI / 180); // secante en grados
                        var resultRad = 1 / Math.cos(value); // secante en radianes
                        document.getElementById("resultcos").innerHTML = "Secante de " + value + "° = " + result
                            .toFixed(
                                3) + "<br>Secante de " + value + " radianes = " + resultRad.toFixed(3);
                    } else {
                        document.getElementById("resultcos").innerHTML = "Secante = ∞";
                    }
                }
            });
        }

        function myFunctionTangente() {
            var operationElement = document.getElementById("operationtan");
            var messageElement = document.getElementById("messagetan");

            messageElement.innerHTML = operationElement.value === "anglet" ?
                "Por favor, ingresa un valor de tangente." :
                "Por favor, ingresa un ángulo en grados entre 0 y 360.";

            operationElement.addEventListener("change", function(event) {
                if (operationElement.value === "anglet") {
                    messageElement.innerHTML = "Por favor, ingresa un valor de tangente.";
                } else if (operationElement.value === "tan" || operationElement.value === "cot") {
                    messageElement.innerHTML = "Por favor, ingresa un ángulo en grados entre 0 y 360.";
                }
                // Limpia el resultado cuando se cambia la operación
                document.getElementById("resultan").innerHTML = "";
            });

            document.getElementById("formtan").addEventListener("submit", function(event) {
                event.preventDefault();
                var operation = operationElement.value;
                var value = document.getElementById("valuetan").value;

                if (!isValidNumber(value)) {
                    document.getElementById("resultan").innerHTML =
                        "Error: Por favor ingresa un número válido.";
                    return;
                }

                value = parseFloat(value);
                var result;
                if (operation === "anglet") {
                    result = Math.atan(value); // resultado en radianes
                    document.getElementById("resultan").innerHTML = "Ángulo en radianes = " + result.toFixed(
                            3) +
                        "<br>Ángulo en grados = " + (result * 180 / Math.PI).toFixed(3) + "°";
                } else if (operation === "tan") {
                    if (value % 180 === 90) {
                        document.getElementById("resultan").innerHTML = "Tangente de " + value + "° = ∞";
                    } else {
                        result = Math.tan(value * Math.PI / 180); // tangente en grados
                        var resultRad = Math.tan(value); // tangente en radianes
                        document.getElementById("resultan").innerHTML = "Tangente de " + value + "° = " + result
                            .toFixed(
                                3) + "<br>Tangente de " + value + " radianes = " + resultRad.toFixed(3);
                    }
                } else if (operation === "cot") {
                    if (value !== 0 && value !== 180) {
                        result = 1 / Math.tan(value * Math.PI / 180); // cotangente en grados
                        var resultRad = 1 / Math.tan(value); // cotangente en radianes
                        document.getElementById("resultan").innerHTML = "Cotangente de " + value + "° = " + result
                            .toFixed(
                                3) + "<br>Cotangente de " + value + " radianes = " + resultRad.toFixed(3);
                    } else {
                        document.getElementById("resultan").innerHTML = "Cotangente = ∞";
                    }
                }
            });
        }

        const closeModalButtons = document.querySelectorAll('.close-button');
        closeModalButtons.forEach(button => {
            button.addEventListener('click', event => {
                const modalId = event.target.dataset.modal;
                document.getElementById(modalId).style.display = 'none';
                document.getElementById(modalId + '-background').style.display = 'none';
                console.log('Cerrado', modalId);
            });
        });
    </script>
@endsection

@section('css')
    <style>
        .modal-background {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(95, 85, 85, 0.5);
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            background-color: #fefefe;
            padding: 20px;
            /* Reducido de 20px a 10px */
            border: 1px solid #888;
            width: auto;
            height: auto;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            border-radius: 10px;
            font-family: Arial, sans-serif;
            color: #333;
        }


        .close-button {
            color: #aaaaaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            background-color: #f44336;
            border: none;
            text-align: center;
            border-radius: 50%;
            padding: 10px 20px;
            transition: 0.3s;

        }

        .close-button:hover,
        .close-button:focus {
            color: #ffffff;
            background-color: #555;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
    <style>
        .bold-text {
            font-weight: bold;
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
