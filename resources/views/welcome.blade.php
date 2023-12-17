@extends('layouts.user')
@section('content')
    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <p id="modal-text"></p>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <h2>Los Sistemas en la Educacion</h2>
                    <p>El rápido desarrollo de la tecnología y de la informática está proporcionando
                        herramientas revolucionarias en todos los campos de la ciencia . En este sentido, los sistemas
                        interactivos multimedia se están integrando en nuestro entorno .
                        La tecnología multimedia ha llegado a todos los campos esenciales de nuestra sociedad: al
                        trabajo, a la cultura y al ocio y por supuesto a la educación..</p>
                    <h2>Introduccion al Curso de Matematicas</h2>
                    <p>Uno de los grandes temas tratados en las unidades educativas o instituciones es el tema de los
                        recursos digitales y como implementar estos en el día a día de los estudiantes en las materias que
                        más se necesita como ser matemáticas, esta a su vez, si no se desarrolla adecuadamente puede
                        conllevar múltiples perjuicios en un futuro no muy cercano. Por ello se debe preparar a las personas
                        para que gusten y disfruten de los beneficios de esta.</p>
                </div>
                <div class="col-6">
                    <div>
                        <img class="imgPr" src="/storage/imagenes/FondoW.jpg" width="550" height="400" align="right">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        window.onload = function() {
            var modal = document.getElementById("myModal");
            var span = document.getElementsByClassName("close")[0];

            if ("{{ session('error') }}") {
                document.getElementById("modal-text").innerText = "{{ session('error') }}";
                modal.style.display = "block";
                setTimeout(function() {
                    modal.style.display = "none";
                }, 3000);
            }

            span.onclick = function() {
                modal.style.display = "none";
            }

            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }
        }
    </script>
@endsection

@section('css')
    <style>
        .imgPr {
            border-radius: 15px;
            box-shadow: 10px 10px 5px grey;
        }

        p {
            font-size: 17px;
        }

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

        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 50%;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            animation-name: animatetop;
            animation-duration: 0.4s;
        }

        @keyframes animatetop {
            from {
                top: -300px;
                opacity: 0
            }

            to {
                top: 0;
                opacity: 1
            }
        }
    </style>
@endsection
