@extends('layouts.user')

<head>
    <title>ver recurso</title>
</head>
@section('content')
    <div class="card">
        <div class="card-body">
            <p> El recurso {{ $media_resource->resource_type }} es {!! $media_resource->description !!}</p>
            <div class="video-container">
                <iframe class="my-video rounded border border-dark" width="560" height="315"
                    src="{{ $media_resource->link_video }}" title="YouTube video player" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    allowfullscreen></iframe>
            </div>
            <a href="{{ route('theme_index') }}" class="btn btn-warning">Volver</a>
        </div>
    </div>
@endsection

@section('css')
    <style>
        .video-container {
            position: relative;
            text-align: center;
            padding-bottom: 56.25%;
            height: 0;
        }

        .video-container iframe {
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            top: 0;
            width: 75%;
            height: 75%;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
        }
    </style>
@endsection

@section('js')
@endsection
