@extends('layouts.user')

<head>
    <title>Funciones trigonometricas</title>
</head>
@section('content')
    <!-- Modal 1 -->
    <div class="modal-background" id="modal1-background">
        <div class="modal" id="modal1">
            <span class="close-button" data-modal="modal1">&times;</span>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <h2>Funcion de Sen 0</h2>
                            <p>El seno del ángulo (se abrevia sen) es la razón o la división de la longitud del cateto
                                opuesto (CO) entre la longitud de la hipotenusa (H);</p>
                        </div>
                        <div class="col-6">
                            <div>
                                <h2>Calcular Ángulo o Sen 0</h2>
                                <p>nota:usar punto para indicar los decimales</p>
                                <form id="formseno">
                                    <select id="operation" name="operation">
                                        <option value="angles">Calcular Ángulo</option>
                                        <option value="sin">Calcular Seno</option>
                                    </select>
                                    <br><br>
                                    <label for="value">Valor:</label>
                                    <input type="text" id="value" name="value">
                                    <input type="submit" value="Calcular">
                                </form>
                                <h4 class="fw-bolder" id="resultSeno"></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal 2 -->
    <div class="modal-background" id="modal2-background">
        <div class="modal" id="modal2">
            <span class="close-button" data-modal="modal2">&times;</span>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <h2>Funcion de Coseno</h2>
                            <p>El coseno del ángulo (se abrevia cos) es la razón entre la longitud del cateto adyacente (CA)
                                entre la longitud de la hipotenusa (H)</p>
                        </div>
                        <div class="col-6">
                            <div>
                                <h2>Calcular Ángulo o Coseno</h2>
                                <p>nota:usar punto para indicar los decimales</p>
                                <form id="formcos">
                                    <select id="operationcos" name="operation">
                                        <option value="anglec">Calcular Ángulo</option>
                                        <option value="cos">Calcular Coseno</option>
                                    </select>
                                    <br><br>
                                    <label for="value">Valor:</label>
                                    <input type="text" id="valuecos" name="value">
                                    <input type="submit" value="Calcular">
                                </form>
                                <h4 class="fw-bolder" id="result"></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal 3 -->
    <div class="modal-background" id="modal3-background">
        <div class="modal" id="modal3">
            <span class="close-button" data-modal="modal3">&times;</span>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <h2>Funcion de Tangente</h2>
                            <p>La tangente del ángulo (se abrevia tan) es la razón entre la longitud del CO entre el CA,
                                esto es igual a la división del seno entre el coseno</p>
                        </div>
                        <div class="col-6">
                            <div>
                                <h2>Calcular Ángulo o Tangente</h2>
                                <p>nota:usar punto para indicar los decimales</p>
                                <form id="formtan">
                                    <select id="operationtan" name="operation">
                                        <option value="anglet">Calcular Ángulo</option>
                                        <option value="tan">Calcular Tangente</option>
                                    </select>
                                    <br><br>
                                    <label for="value">Valor:</label>
                                    <input type="text" id="valuetan" name="value">
                                    <input type="submit" value="Calcular">
                                </form>
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
                                <td><button class="open-modal-button btn btn-success btn-sm"
                                        data-modal="modal1">Seno</button></td>
                            </tr>
                            <tr>
                                <td class="bold-text">Coseno</td>
                                <td>CA/H=a/c</td>
                                <td>CA/H=b/c</td>
                                <td><button class="open-modal-button btn btn-success btn-sm"
                                        data-modal="modal2">Coseno</button></td>
                            </tr>
                            <tr>
                                <td class="bold-text">Tangente</td>
                                <td>CO/CA=b/a</td>
                                <td>CO/CA=a/b</td>
                                <td><button class="open-modal-button btn btn-success btn-sm"
                                        data-modal="modal3">Tangente</button></td>
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
                } else {
                    myFunctionTangente();
                }
            });
        });

        function myFunctionSeno() {
            document.getElementById("formseno").addEventListener("submit", function(event) {
                event.preventDefault();
                var operation = document.getElementById("operation").value;
                var value = document.getElementById("value").value;
                if (!isValidNumber(value)) {
                    document.getElementById("resultSeno").innerHTML = "Error: Por favor ingresa un número válido.";
                    return;
                }
                value = parseFloat(value);
                var result;
                if (operation === "angles") {
                    if (value >= -1 && value <= 1) {
                        result = Math.asin(value) * 180 / Math.PI;
                        document.getElementById("resultSeno").innerHTML = "Ángulo = " + result.toFixed(3) + "°";
                    } else {
                        document.getElementById("resultSeno").innerHTML =
                            "Error: El valor del seno debe estar entre -1 y 1.";
                    }
                } else if (operation === "sin") {
                    result = Math.sin(value * Math.PI / 180);
                    console.log(result);
                    document.getElementById("resultSeno").innerHTML = "Seno de " + value + "° = " + result.toFixed(
                        3);
                }
            });
        }

        function myFunctionCoseno() {
            document.getElementById("formcos").addEventListener("submit", function(event) {
                event.preventDefault();
                var operation = document.getElementById("operationcos").value;
                var value = document.getElementById("valuecos").value;

                if (!isValidNumber(value)) {
                    document.getElementById("result").innerHTML = "Error: Por favor ingresa un número válido.";
                    return;
                }

                value = parseFloat(value);
                var result;
                if (operation === "anglec") {
                    if (value >= -1 && value <= 1) {
                        result = Math.acos(value) * 180 / Math.PI;
                        document.getElementById("result").innerHTML = "Ángulo = " + result.toFixed(3) + "°";
                    } else {
                        document.getElementById("result").innerHTML =
                            "Error: El valor del coseno debe estar entre -1 y 1.";
                    }
                } else if (operation === "cos") {
                    result = Math.cos(value * Math.PI / 180);
                    console.log(result);
                    document.getElementById("result").innerHTML = "Coseno de " + value + "° = " + result
                        .toFixed(3);
                }
            });
        }

        function myFunctionTangente() {
            console.log('myFunctionTangente llamado');
            document.getElementById("formtan").addEventListener("submit", function(event) {
                event.preventDefault();
                var operation = document.getElementById("operationtan").value;
                var value = document.getElementById("valuetan").value;

                if (!isValidNumber(value)) {
                    document.getElementById("resultan").innerHTML = "Error: Por favor ingresa un número válido.";
                    return;
                }

                value = parseFloat(value);
                var result;
                console.log(value);
                if (operation === "anglet") {
                    result = Math.atan(value) * 180 / Math.PI;
                    document.getElementById("resultan").innerHTML = "Ángulo = " + result.toFixed(3) + "°";
                } else if (operation === "tan") {
                    result = Math.tan(value * Math.PI / 180);
                    if (Math.abs(result) > 1e10) {
                        document.getElementById("resultan").innerHTML = "Tangente de " + value + "° = ∞";
                    } else {
                        document.getElementById("resultan").innerHTML = "Tangente de " + value + "° = " + result
                            .toFixed(3);
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
