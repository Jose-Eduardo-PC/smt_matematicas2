@extends('layouts.user')

<head>
    <title>Tabla</title>
</head>
@section('content')
    <div class="card">
        <div class="card-body">
            <h1>Tabla de Cosenos, Senos y Cosenos</h1>
            <form id="calificar" method="POST" action="{{ route('rate1') }}">
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
            <form id="quitar" method="POST" action="{{ route('rate1') }}">
                @csrf
                <input type="hidden" name="rating" value="">
            </form>
            <div>
                <button form="quitar" type="submit" class="btn btn-secondary">Quitar</button>
                <button form="calificar" type="submit" class="btn btn-primary">Calificar</button>
                <a href="{{ route('tools') }}" class="btn btn-warning">Volver</a>
            </div>
            <br>
            <div>
                <select id="intervalo" onchange="generarTabla()" class="mb-3">
                    <option value="1">1</option>
                    <option value="5">5</option>
                    <option value="10">10</option>
                </select>
            </div>


        </div>
    </div>
    </div>
@endsection

@section('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('intervalo').value = '10';
            generarTabla();
        });

        function generarTabla() {
            let intervalo = parseInt(document.getElementById('intervalo').value);
            let angulos = [...Array(361).keys()].filter(x => x % intervalo === 0);
            let tabla = document.createElement('table');
            let encabezado = document.createElement('tr');
            let thAngulo = document.createElement('th');
            thAngulo.innerText = 'Ángulo';
            let thSeno = document.createElement('th');
            thSeno.innerText = 'Seno';
            let thCoseno = document.createElement('th');
            thCoseno.innerText = 'Coseno';
            let thTangente = document.createElement('th');
            thTangente.innerText = 'Tangente';
            encabezado.appendChild(thAngulo);
            encabezado.appendChild(thSeno);
            encabezado.appendChild(thCoseno);
            encabezado.appendChild(thTangente);
            tabla.appendChild(encabezado);

            for (let angulo of angulos) {
                let fila = document.createElement('tr');
                let tdAngulo = document.createElement('td');
                tdAngulo.innerText = angulo;
                let tdSeno = document.createElement('td');
                tdSeno.innerText = Math.sin(angulo * Math.PI / 180).toFixed(4);
                let tdCoseno = document.createElement('td');
                tdCoseno.innerText = Math.cos(angulo * Math.PI / 180).toFixed(4);
                let tdTangente = document.createElement('td');
                let tangente = Math.tan(angulo * Math.PI / 180);
                if (Math.abs(tangente) > 1e15) {
                    tdTangente.innerText = '∞';
                } else {
                    tdTangente.innerText = tangente.toFixed(4);
                }
                fila.appendChild(tdAngulo);
                fila.appendChild(tdSeno);
                fila.appendChild(tdCoseno);
                fila.appendChild(tdTangente);
                tabla.appendChild(fila);
            }

            let cardBody = document.querySelector('.card-body');

            if (cardBody.querySelector('table')) {
                cardBody.removeChild(cardBody.querySelector('table'));
            }

            cardBody.appendChild(tabla);
        }
    </script>
@endsection

@section('css')
    <style>
        .contenedor {
            display: flex;
            justify-content: center;
        }

        select {
            color: #fff;
            background-color: #4d2ddf;
            padding: 12px;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            margin-right: 10px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            text-align: center;
            padding: 8px;
            border-bottom: 1px solid #ddd;
        }

        tr:hover {
            background-color: #f5f5f5;
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
