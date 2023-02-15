@extends('layouts.user')

@section('content')
    <h4>{{ $actividade->nombre }}</h4>
    <p>{{ $actividade->descripcion }}</p>
    <iframe src="https://eduardo777.h5p.com/content/1291823393361655788/embed" aria-label="Numeros racionales" width="1088"
        height="637" frameborder="0" allowfullscreen="allowfullscreen"
        allow="autoplay *; geolocation *; microphone *; camera *; midi *; encrypted-media *"></iframe>
    <script src="https://eduardo777.h5p.com/js/h5p-resizer.js" charset="UTF-8"></script>
@endsection
