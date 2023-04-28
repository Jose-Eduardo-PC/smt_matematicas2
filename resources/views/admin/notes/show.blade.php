@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-body">
            <h3>Datos del examen</h3>
            <h4>{{ $test->name_test }}</h4>
            <p>{{ $test->content }}</p>
        </div>
    </div>
@endsection
