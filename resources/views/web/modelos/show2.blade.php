@extends('layouts.user')

<head>
    <title>simulaciones</title>
</head>

@section('content')
    <div class="card">
        <div class="card-body">
            <div>
                <iframe src="https://phet.colorado.edu/sims/html/trig-tour/latest/trig-tour_es.html" width="800"
                    height="600" allowfullscreen>
                </iframe>
            </div>
            <br>
            <button class="btn btn-warning" onclick="goBack()">Volver</button>
        </div>
    </div>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
@endsection
