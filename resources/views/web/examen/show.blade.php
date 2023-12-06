@extends('layouts.user')

<head>
    <title>Examen</title>
</head>
@section('content')
    <div class="card">
        <div class="card-body">
            <h2>{{ $test->name_test }}</h2>
            <p>{{ $test->content }}</p>
            @if ($hasTest)
                <div class="card">
                    <div class="card-body">
                        <h4>Ya diste el examen y tu califiacion fue {{ $test_user->points }}</h4>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        @foreach ($test->questions as $question)
                            <div class="pregunta">
                                <p>{{ $question->statement }}</p>
                                <ul>
                                    @foreach ($question->options as $option => $value)
                                        <li
                                            class="{{ $question->solved_exam($user_id)->selected_question == $option ? 'seleccionada' : '' }}">
                                            <span
                                                class="{{ $question->correct_paragraph == $option ? 'correcta' : 'incorrecta' }}">
                                                {{ $question->correct_paragraph == $option ? '✔️' : '❌' }}
                                            </span>
                                            <label><b>{{ $option }})</b> {{ $value }}</label>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endforeach
                    </div>
                </div>
            @else
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#examModal">
                    Abrir examen
                </button>
                <!-- Modal -->
                <div class="modal fade" id="examModal" tabindex="-1" role="dialog" aria-labelledby="examModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="examModalLabel">Examen</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('test_create') }}" method="POST" id="questionForm">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $test->id }}">
                                    @foreach ($test->questions as $index => $question)
                                        <div class="question" id="question{{ $index + 1 }}" style="display: none;">
                                            <ul>
                                                <h4>{{ $question->statement }}</h4>
                                                @foreach ($question->options as $option => $value)
                                                    <li>
                                                        <label>
                                                            <input type="radio"
                                                                name="correct_paragraph_{{ $question->id }}"
                                                                value="{{ $option }}">
                                                            <label><b>{{ $option }})</b> {{ $value }}</label>
                                                        </label>
                                                    </li>
                                                @endforeach
                                                @if ($index > 0)
                                                    <button class="btn previous-question" type="button">Atrás</button>
                                                @endif
                                                @if ($index + 1 < count($test->questions))
                                                    <button class="btn next-question" type="button">Siguiente</button>
                                                @endif
                                            </ul>
                                        </div>
                                    @endforeach
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                <button form="questionForm" class="btn btn-primary" type="submit">Terminar</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
@section('css')
    <style>
        .pregunta li {
            margin-bottom: 10px;
            padding: 5px;
            border-radius: 5px;
        }

        .seleccionada {
            background-color: rgb(46, 46, 194);
            color: white;
        }

        .correcta {
            color: rgb(34, 214, 34);
        }

        .incorrecta {
            color: rgb(221, 21, 21);
        }

        /* Resto del CSS... */

        p {
            color: #777;
            font-size: 15px;
            line-height: 1.5;
            font-weight: bold;
        }

        body {
            font-family: Arial, sans-serif;
            font-size: 15px;
            line-height: 1.5;
            font-weight: bold;
        }

        .question {
            background-color: #f4f4f4;
            padding: 20px;
            margin-bottom: 20px;
        }

        .question h4 {
            margin-bottom: 10px;
        }

        .question ul {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .question li {
            margin-bottom: 10px;
        }

        .btn {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #45a049;
        }
    </style>
@endsection
@section('js')
    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            document.querySelector('#question1').style.display = 'block';
            document.querySelectorAll('.next-question').forEach((button, index) => {
                button.addEventListener('click', (event) => {
                    document.querySelector('#question' + (index + 1)).style.display = 'none';
                    document.querySelector('#question' + (index + 2)).style.display = 'block';
                });
            });
            document.querySelectorAll('.previous-question').forEach((button, index) => {
                button.addEventListener('click', (event) => {
                    document.querySelector('#question' + (index + 2)).style.display = 'none';
                    document.querySelector('#question' + (index + 1)).style.display = 'block';
                });
            });
        });
    </script>
@endsection
