@extends('layouts.user')

<head>
    <title>simulaciones</title>
</head>

@section('content')
    <div class="card">
        <div class="card-body">
            <iframe src="https://phet.colorado.edu/sims/html/graphing-lines/latest/graphing-lines_es.html" width="800"
                height="600" allowfullscreen>
            </iframe>
            <div>
                <a href="{{ route('models') }}" class="btn btn-warning">Volver</a>
            </div>
        </div>
    </div>
@endsection
