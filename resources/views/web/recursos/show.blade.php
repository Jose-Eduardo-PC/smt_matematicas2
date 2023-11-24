@extends('layouts.user')

<head>
    <title>ver recurso</title>
</head>
@section('content')
    <div class="card">
        <div class="card-body">
            <p> El recurso {{ $media_resource->resource_type }} es {!! $media_resource->description !!}</p>
            <div class="resource-container">
                @if ($media_resource->resource_type == 'video')
                    <iframe class="my-resource rounded border border-dark" width="560" height="315"
                        src="{{ $media_resource->link_video }}" title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen></iframe>
                @elseif ($media_resource->resource_type == 'imagen')
                    <img class="my-resource rounded border border-dark"
                        src="{{ Storage::url($media_resource->link_video) }}" alt="Vista previa">
                @elseif ($media_resource->resource_type == 'pdf')
                    <embed class="my-resource rounded border border-dark"
                        src="{{ Storage::url($media_resource->link_video) }}" type="application/pdf" width="100%"
                        height="600px" />
                @endif
            </div>
            <a href="{{ route('media_index') }}" class="btn btn-primary"
                style="background-color: #ca0606; border: none; color: white; padding: 15px 32px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px; margin: 4px 2px; cursor: pointer;">
                Volver al Menu
            </a>
        </div>
    </div>
@endsection

@section('css')
    <style>
        .resource-container {
            position: relative !important;
            text-align: center !important;
            height: 0 !important;
            padding-bottom: 56.25% !important;
            /* Asegura que el contenedor mantiene una relación de aspecto de 16:9 */
            overflow: hidden !important;
            /* Asegura que nada se desborde del contenedor */
        }

        .resource-container .my-resource {
            position: absolute !important;
            top: 50% !important;
            left: 50% !important;
            width: 75% !important;
            /* Ajusta el ancho al 75% para reducir un poco el tamaño */
            height: 75% !important;
            /* Ajusta la altura al 75% para reducir un poco el tamaño */
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5) !important;
            transform: translate(-50%, -50%) !important;
            /* Centra el recurso en el contenedor */
        }
    </style>
@endsection

@section('js')
@endsection
