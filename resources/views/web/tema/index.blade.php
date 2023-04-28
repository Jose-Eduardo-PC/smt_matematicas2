@extends('layouts.user')

@section('content')
    <div class="card">
        <div class="card-body">
            <h2>Listado de Temas</h2>
            <div class="row">
                @foreach ($themes as $theme)
                    <a href="{{ route('theme_show', $theme) }}" class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h4>{{ $theme->name_theme }}</h4>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
@endsection

@section('css')
@endsection
@section('js')
@endsection
