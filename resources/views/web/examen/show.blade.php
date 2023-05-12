@extends('layouts.user')

<head>
    <title>Examen</title>
</head>
@section('content')
    <div class="card">
        <div class="card-body">
            <h2>{{ $test->name_test }}</h2>
            <p>{{ $test->content }}</p>
        </div>
    </div>
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
                            <li
                                class="{{ $question->correct_paragraph == 'A' ? 'correcta' : 'incorrecta' }} {{ $question->solved_exam($user_id)->selected_question == 'A' ? 'seleccionada' : '' }}">
                                {{ $question->incisoA }}</li>
                            <li
                                class="{{ $question->correct_paragraph == 'B' ? 'correcta' : 'incorrecta' }} {{ $question->solved_exam($user_id)->selected_question == 'B' ? 'seleccionada' : '' }}">
                                {{ $question->incisoB }}</li>
                            <li
                                class="{{ $question->correct_paragraph == 'C' ? 'correcta' : 'incorrecta' }} {{ $question->solved_exam($user_id)->selected_question == 'C' ? 'seleccionada' : '' }}">
                                {{ $question->incisoC }}</li>
                            <li
                                class="{{ $question->correct_paragraph == 'D' ? 'correcta' : 'incorrecta' }} {{ $question->solved_exam($user_id)->selected_question == 'D' ? 'seleccionada' : '' }}">
                                {{ $question->incisoD }}</li>
                        </ul>
                    </div>
                @endforeach
            </div>
        </div>
    @else
        <div class="card">
            <div class="card-body">
                <form action="{{ route('test_create') }}" method="POST" id="questionForm">
                    @csrf
                    <input type="hidden" name="id" value="{{ $test->id }}">
                    @foreach ($test->questions as $index => $question)
                        <div class="question" id="question{{ $index + 1 }}"
                            @if ($index > 0) style="display: none;" @endif>
                            <ul>
                                <h4>{{ $question->statement }}</h4>
                                <li>
                                    <label>
                                        <input type="radio" name="correct_paragraph_{{ $question->id }}" value="A">
                                        <label><b>A)</b> {{ $question->incisoA }}</label>
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" name="correct_paragraph_{{ $question->id }}" value="B">
                                        <label><b>B)</b>{{ $question->incisoB }}</label>
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" name="correct_paragraph_{{ $question->id }}" value="C">
                                        <label><b>C)</b>{{ $question->incisoC }}</label>
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" name="correct_paragraph_{{ $question->id }}" value="D">
                                        <label><b>D)</b>{{ $question->incisoD }}</label>
                                    </label>
                                </li>
                            </ul>
                            @if ($index + 1 < count($test->questions))
                                <button class="btn" type="button"
                                    onclick="showNextQuestion({{ $index + 1 }})">Siguiente</button>
                            @endif
                        </div>
                    @endforeach
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Terminar</button>
                    </div>
                </form>
            </div>
        </div>
    @endif
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
            border: 2px solid rgb(34, 214, 34);
        }

        .incorrecta {
            border: 2px solid rgb(221, 21, 21);
        }

        .pregunta li {
            margin-bottom: 10px;
            padding: 5px;
            border-radius: 5px;
            margin-right: 10px;
        }

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
        function showNextQuestion(currentQuestion) {
            document.getElementById(`question${currentQuestion}`).style.display = 'none';
            document.getElementById(`question${currentQuestion + 1}`).style.display = 'block';
        }
    </script>
@endsection
