@extends('layouts.user')

<head>
    <title>Funciones trigonometricas</title>
</head>
@section('content')
    <div class="card">
        <div class="card-body">
            <H2>Funciones trigonometricas</H2>
            <p>Por ejemplo, para el triángulo rectángulo en la imagen, tenemos las siguientes razones trigonométricas:</p>
            <div class="row">
                <div class="col-6">
                    <table class="table table-sm">
                        <thead class="thead-dark">
                            <tr>
                                <th></th>
                                <th class="text-light"><b>Ángulo α</b></th>
                                <th class="text-light"><b>Ángulo β</b></th>
                            </tr>
                            <tr>
                                <td>Cateto opuesto (CO)</td>
                                <td>b</td>
                                <td>a</td>
                            </tr>
                            <tr>
                                <td>Cateto adyacente (CA)</td>
                                <td>a</td>
                                <td>b</td>
                            </tr>
                            <tr>
                                <td>Hipotenusa (H)</td>
                                <td>c</td>
                                <td>c</td>
                            </tr>
                    </table>
                    <table class="table table-sm">
                        <thead class="thead-dark">
                            <tr>
                                <th></th>
                                <th class="text-light"><b>Ángulo α</b></th>
                                <th class="text-light"><b>Ángulo β</b></th>
                                <th class="text-light"><b>Herramienta</b></th>
                            </tr>
                            <tr>
                                <td>Seno</td>
                                <td>CO/H=b/c</td>
                                <td>CO/H=a/c</td>
                                <td class="tdbt"><button class="open-modal-button btn btn-success btn-sm"
                                        data-modal="modal1">Seno</button></td>
                            </tr>
                            <tr>
                                <td>Coseno</td>
                                <td>CA/H=a/c</td>
                                <td>CA/H=b/c</td>
                                <td class="tdbt"><button class="open-modal-button btn btn-success btn-sm"
                                        data-modal="modal2">Coseno</button>
                                </td>
                            </tr>
                            <tr>
                                <td>Tangente</td>
                                <td>CO/CA=b/a</td>
                                <td>CO/CA=a/b</td>
                                <td class="tdbt"><button class="open-modal-button btn btn-success btn-sm"
                                        data-modal="modal3">Tangente</button>
                                </td>
                            </tr>
                    </table>
                </div>
                <div class="col-6">
                    <img src="\storage\imagenes\pizarra_triangulo.jpg" alt="IMG" width="500" height="400">
                </div>
                <a href="{{ route('tools') }}" class="btn btn-warning">Volver</a>
            </div>
            <!-- Botones para abrir los modales -->

            <!-- Modal 1 -->
            <div class="modal-background" id="modal1-background">
                <div class="modal" id="modal1">
                    <span class="close-button" data-modal="modal1">&times;</span>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <h2>Funcion de Sen 0</h2>
                                    <p>El seno del ángulo (se abrevia sen) es la razón o la división de la longitud del
                                        cateto
                                        opuesto (CO)
                                        entre la
                                        longitud de la hipotenusa (H);</p>
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
                                    <p>el coseno del ángulo (se abrevia cos) es la razón entre la longitud del cateto
                                        adyacente
                                        (CA)
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
                                    <p>La tangente del ángulo (se abrevia tan) es la razón entre la longitud del CO entre el
                                        CA,
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
        </div>
    </div>
@endsection

@section('js')
    <script>
        // Obtener todos los botones para abrir modales
        const openModalButtons = document.querySelectorAll('.open-modal-button');

        // Añadir evento click a cada botón para abrir el modal correspondiente
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
                var value = parseFloat(document.getElementById("value").value);
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
            document.getElementById("formcoseno").addEventListener("submit", function(event) {
                event.preventDefault();
                var operation = document.getElementById("operation").value;
                var value = parseFloat(document.getElementById("value").value);
                var result;
                if (operation === "angles") {
                    if (value >= -1 && value <= 1) {
                        result = Math.acos(value) * 180 / Math.PI;
                        document.getElementById("resultCoseno").innerHTML = "Ángulo = " + result.toFixed(3) + "°";
                    } else {
                        document.getElementById("resultCoseno").innerHTML =
                            "Error: El valor del coseno debe estar entre -1 y 1.";
                    }
                } else if (operation === "cos") {
                    result = Math.cos(value * Math.PI / 180);
                    console.log(result);
                    document.getElementById("resultCoseno").innerHTML = "Coseno de " + value + "° = " + result
                        .toFixed(3);
                }
            });
        }


        function myFunctionTangente() {
            console.log('myFunctionTangente llamado');
            document.getElementById("formtan").addEventListener("submit", function(event) {
                event.preventDefault();
                var operation = document.getElementById("operationtan").value;
                var value = parseFloat(document.getElementById("valuetan").value);
                var result;
                console.log(value);
                if (operation === "anglet") {
                    result = Math.atan(value) * 180 / Math.PI;
                    document.getElementById("resultan").innerHTML = "Ángulo = " + result.toFixed(3) + "°";
                } else if (operation === "tan") {
                    result = Math.tan(value * Math.PI / 180);
                    if (Math.abs(result) > 1e10) { // Puedes ajustar este límite según tus necesidades
                        document.getElementById("resultan").innerHTML = "Tangente de " + value + "° = ∞";
                    } else {
                        document.getElementById("resultan").innerHTML = "Tangente de " + value + "° = " + result
                            .toFixed(3);
                    }
                }
            });
        }


        // Obtener todos los botones para cerrar modales
        const closeModalButtons = document.querySelectorAll('.close-button');

        // Añadir evento click a cada botón para cerrar el modal correspondiente
        closeModalButtons.forEach(button => {
            button.addEventListener('click', event => {
                const modalId = event.target.dataset.modal;
                document.getElementById(modalId).style.display = 'none';
                document.getElementById(modalId + '-background').style.display = 'none';
                console.log('Cerrado', modalId); // Agrega esta línea
            });
        });
    </script>
@endsection

@section('css')
    <style>
        .tdbt {
            text-align: center;
        }

        /* Estilo para el fondo oscuro */
        .modal-background {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            display: none;
        }

        /* Estilo para el modal */
        .modal {
            position: fixed;
            top: 40%;
            left: 40%;
            width: 70%;
            height: 80%;
            transform: translate(-25%, -30%);
            padding: 20px;
            border-radius: 10px;
            display: none;
        }

        .modal {
            position: relative;
        }

        /* Estilo para el botón de cerrar */
        .close-button {
            font-size: 15px;
            color: white;
            background-color: red;
            padding: 10px 20px;
            border-radius: 5px;
        }
    </style>
@endsection
