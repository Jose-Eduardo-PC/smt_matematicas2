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
                <button class="btn btn-warning" onclick="goBack()">Volver</button>
            </div>
        </div>
    </div>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
@endsection
