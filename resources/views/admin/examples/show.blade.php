@extends('layouts.admin_show')
<title>Ejemplos</title>
@section('content')
    <div class="card">
        <div class="card-body">
            <h2>Ejemplo de : {{ $name_cont }}</h2>
            <p>{!! $sample->text_ejm !!}</p>
            <div class="divcent">
                <img src="{{ Storage::url($sample->image_ejm) }}" class="responsive-image zoom">
            </div>
        </div>
    </div>
@endsection

@section('css')
    <style>
        .responsive-image {
            max-width: 100%;
            height: auto;
        }

        .zoom {
            transition: transform .2s;
            overflow: hidden;
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

        .divcent {
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
@endsection
