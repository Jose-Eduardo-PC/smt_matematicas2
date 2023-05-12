@extends('layouts.user')

<head>
    <title>Ver Temas</title>
</head>
@section('content')
    <div class="card">
        <div class="card-body">
            <h2>{{ $activity->name_activity }}</h2>
            <p>{!! $activity->description !!}</p>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="iframe-container">
                <div class="container">
                    <iframe class="responsive-iframe" src={{ $activity->link_acti }} style="border:0px" allowfullscreen="true"
                        webkitallowfullscreen="true" mozallowfullscreen="true"></iframe>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('css')
    <style>
        .iframe-container {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 520px;
        }

        .container {
            position: relative;
            overflow: hidden;
            width: 65%;
            padding-top: calc(65% * 9 / 16);
        }

        .responsive-iframe {
            position: absolute;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
            width: 100%;
            height: 100%;
            border-radius: 10px;
        }
    </style>
@endsection
@section('js')
@endsection
