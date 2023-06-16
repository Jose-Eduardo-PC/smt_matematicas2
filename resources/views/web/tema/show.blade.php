@extends('layouts.user')

<head>
    <title>Ver Temas</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

@section('content')
    <div class="card">
        <div class="card-body">
            <h2>{{ $theme->name_theme }}</h2>
            <p>{!! $theme->description !!}</p>
            <form action="{{ route('like_theme', ['theme' => $theme->id]) }}" method="POST">
                @csrf
                <button type="submit" class="like-button">
                    <i class="fa-solid fa-thumbs-up" style="{{ $user_liked ? 'color: blue;' : 'color: lightgray;' }}"></i>
                </button>
            </form>
        </div>
    </div>
    @foreach ($theme->contents as $content)
        <div class="card">
            <div class="card-body">
                <div class="content-container">
                    <div class="text-container">
                        <h2>{{ $content->name_cont }}</h2>
                        <p>{!! $content->text_cont !!}</p>
                    </div>
                    @if ($content->image_cont)
                        <div class="image-container">
                            <img src="{{ Storage::url($content->image_cont) }}" class="responsive-image zoom"><br><br>
                        </div>
                    @endif
                </div>
                @if ($content->examples->count() > 0)
                    <div>
                        <h3>Ejemplos</h3>
                    </div>
                    @foreach ($content->examples as $example)
                        <div class="content-container">
                            <div class="text-container">
                                <p>{!! $example->text_ejm !!}</p>
                                @if ($example->image_ejm)
                                    <div class="image-container">
                                        <img src="{{ Storage::url($example->image_ejm) }}" class="responsive-image zoom">
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    @endforeach
    <div class="card">
        <a href="{{ route('theme_index') }}" class="btn btn-warning">Volver</a>
    </div>
@endsection

@section('css')
    <style>
        .content-container {
            display: flex;
            align-items: center;
        }

        .text-container {
            flex-grow: 1;
        }

        .image-container {
            width: 30%;
            margin-left: 10px;
        }

        .zoom {
            transition: transform .2s;
            overflow: hidden;
            position: relative;
            z-index: 1;
        }

        .zoom:hover {
            transform: scale(1.5);
        }

        .zoom:hover img {
            cursor: move;
        }

        .zoom:active img {
            cursor: grabbing;
        }

        .like-button {
            font-size: 24px;
            padding: 10px 20px;
            border-radius: 5px;
            border: none;
            cursor: pointer;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .card {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            transition: 0.3s;
            width: 95%;
            margin: auto;
            margin-top: 50px;
            padding: 5px;
        }

        .card:hover {
            box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
        }

        .card-body {
            margin-top: 20px;
        }

        h2 {
            color: #333;
        }

        p {
            color: #777;
            font-size: 18px;
            font-weight: 1.5;
            line-height: 1.5;
            font-weight: bold;
        }

        .like-button {
            background-color: transparent;
            border: none;
            cursor: pointer;
        }

        .content-container {
            display: flex;
            flex-wrap: wrap;
        }

        .text-container {
            flex-basis: 70%;
        }

        .image-container {
            flex-basis: 30%;
        }

        .responsive-image {
            width: 90% !important;
            height: auto;
        }
    </style>
@endsection

@section('js')
@endsection
