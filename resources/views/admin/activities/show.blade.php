@extends('layouts.admin_show')

<head>
    <title>ver actividad</title>
</head>
@section('content')
    <div class="card">
        <div class="card-body">
            <h2>{{ $activity->name_activity }}</h2>
            <p>{!! $activity->description !!}</p>

            <!-- Botón para abrir el modal -->
            <button id="myBtn" class="btn btn-success">Ver Actividad</button>
            <!-- El modal -->
            <div id="myModal" class="modal">
                <!-- Contenido del modal -->
                <div class="modal-content">
                    <span class="close">&times;</span>
                    <iframe src="{{ url($activity->link_acti) }}" style="border:0px;width:100%;height:400px"
                        allowfullscreen="true" webkitallowfullscreen="true" mozallowfullscreen="true"></iframe>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('css')
    <style>
        /* Estilo del modal */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
        }

        /* Estilo del contenido del modal */
        .modal-content {
            background-color: #fefefe;
            margin: auto;
            padding: 20px;
            border: 1px solid #888;
            width: 50%;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        /* Estilo del botón de cierre */
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
@endsection

@section('js')
    <script>
        // Obtener el modal
        var modal = document.getElementById("myModal");

        // Obtener el botón que abre el modal
        var btn = document.getElementById("myBtn");

        // Obtener el elemento <span> que cierra el modal
        var span = document.getElementsByClassName("close")[0];

        // Cuando el usuario hace clic en el botón, abrir el modal
        btn.onclick = function() {
            modal.style.display = "block";
        };

        // Cuando el usuario hace clic en <span> (x), cerrar el modal
        span.onclick = function() {
            modal.style.display = "none";
        };

        // Cuando el usuario hace clic en cualquier lugar fuera del modal, cerrarlo
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        };
    </script>
@endsection
