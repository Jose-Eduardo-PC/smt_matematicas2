@extends('layouts.user')

@section('content')
    <div class="card">
        <div class="card-body">
            <h2>{{ $theme->name_theme }}</h2>
            <p>{!! $theme->description !!}</p>
            @foreach ($theme->contents as $content)
                <div class="content-container">
                    <div class="text-container">
                        <h2>{{ $content->name_cont }}</h2>
                        <p>{!! $content->text_cont !!}</p>
                    </div>
                    <div class="image-container">
                        <img src="{{ Storage::url($content->image_cont) }}" class="responsive-image zoom">
                    </div>
                </div>
            @endforeach
        </div>
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

        .responsive-image {
            max-width: 100%;
            height: auto;
        }

        .zoom {
            transition: transform .2s;
            overflow: hidden;
            position: relative;
            z-index: 1;
        }

        .zoom:hover {
            transform: scale(2);
        }

        .zoom:hover img {
            cursor: move;
        }

        .zoom:active img {
            cursor: grabbing;
        }
    </style>
@endsection
@section('js')
@endsection
