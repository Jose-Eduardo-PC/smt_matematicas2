@extends('layouts.user')

@section('content')
    <div class="card">
        <div class="card-body">
            <h2>Listado de Examenes</h2>
            <div class="row">
                @foreach ($tests as $test)
                    <a href="{{ route('test_show', $test) }}" class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h4>{{ $test->name_test }}</h4>
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
