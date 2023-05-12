@extends('layouts.user')
@section('content')
    <div class="card">
        <div class="card-body">
            <h2>Listado de Recursos Multimedia</h2>
            <div class="row">
                @foreach ($resources as $resource)
                    @php
                        $videoId = explode('/embed/', $resource->link_video)[1];
                        $thumbnailUrl = 'https://img.youtube.com/vi/' . $videoId . '/0.jpg';
                    @endphp
                    <a href="{{ route('media_show', $resource) }}" class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <p>{{ $resource->theme->name_theme }}</p>
                                <div class="preview-description">
                                    <img class="thumbnail my-video rounded border border-dark" src="{{ $thumbnailUrl }}"
                                        alt="Vista previa">
                                    <p>{!! $resource->description !!}</p>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
@endsection
@section('css')
    <style>
        .thumbnail {
            width: 200px;
            height: 150px;
            margin: 10px;
        }

        .preview-description {
            display: flex;
        }
    </style>
@endsection
