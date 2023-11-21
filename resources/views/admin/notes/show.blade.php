@extends('layouts.admin_index')

@section('content')
    <div class="card">
        <div class="card-body">
            @foreach ($test->questions as $question)
                <div class="pregunta">
                    <p>{{ $question->statement }}</p>
                    <ul>
                        @foreach ($question->options as $option => $value)
                            <li
                                class="{{ $question->solved_exam($user_id)->selected_question == $option ? 'seleccionada' : '' }}">
                                <span class="{{ $question->correct_paragraph == $option ? 'correcta' : 'incorrecta' }}">
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
