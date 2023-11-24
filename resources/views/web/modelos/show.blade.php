@extends('layouts.user')

<head>
    <title>Simulaciones</title>
</head>
@section('content')
    <div class="card">
        <div class="card-body">
            <div>
                <iframe
                    src="https://phet.colorado.edu/sims/html/graphing-slope-intercept/latest/graphing-slope-intercept_es.html"
                    width="800" height="600" allowfullscreen>
                </iframe>
            </div>
            <br>
            <div>
                <a href="{{ route('models') }}" class="btn btn-primary"
                    style="background-color: #ca0606; border: none; color: white; padding: 15px 32px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px; margin: 4px 2px; cursor: pointer;">
                    Volver al Menu
                </a>
            </div>
        </div>
    </div>
@endsection
