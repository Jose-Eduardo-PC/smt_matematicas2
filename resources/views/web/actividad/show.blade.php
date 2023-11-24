@extends('layouts.user')

<head>
    <title>Ver Temas</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

</head>
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-8">
                            <h2>{{ $activity->name_activity }}</h2>
                            <p>{!! $activity->description !!}</p>
                        </div>
                    </div>
                    <div class="col-2" style="display: flex; justify-content: space-between;">
                        <button form="doneButton" class="btn btn-info {{ $userActivity->done ?? false ? 'done' : '' }}">
                            <i class="bi bi-check-circle"></i>
                        </button>
                        <button form="likeButton" class="btn btn-primary {{ $userActivity->like ?? false ? 'liked' : '' }}">
                            <i class="bi bi-heart"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <form id="doneButton" action="/user-activity/done" method="POST">
        @csrf
        <input type="hidden" name="activity_id" value="{{ $activity->id }}">
        <input type="hidden" name="done" value="1">
    </form>

    <form id="likeButton" action="/user-activity/like" method="POST">
        @csrf
        <input type="hidden" name="activity_id" value="{{ $activity->id }}">
        <input type="hidden" name="like" value="1">
    </form>

    <div class="iframe-container">
        <div class="container">
            <iframe class="responsive-iframe" src={{ $activity->link_acti }} style="border:0px" allowfullscreen="true"
                webkitallowfullscreen="true" mozallowfullscreen="true"></iframe>
        </div>
    </div>

    <a href="{{ route('activity_index') }}" class="btn btn-primary"
        style="background-color: #ca0606; border: none; color: white; padding: 15px 32px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px; margin: 4px 2px; cursor: pointer;">
        Volver al Menu
    </a>
@endsection
@section('css')
    <style>
        .done {
            background-color: green;
        }

        .liked {
            background-color: red;
        }

        .iframe-container {
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
            height: 400px !important;
        }

        .container {
            position: relative !important;
            overflow: hidden !important;
            width: 65% !important;
            padding-top: calc(65% * 9 / 16) !important;
        }

        .responsive-iframe {
            position: absolute !important;
            top: 0 !important;
            left: 0 !important;
            bottom: 0 !important;
            right: 0 !important;
            width: 100% !important;
            height: 100% !important;
            border-radius: 10px !important;
        }
    </style>
@endsection

@section('js')
@endsection
