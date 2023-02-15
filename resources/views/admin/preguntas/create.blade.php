@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-body">
            <h3 class="text-center my-3">Crear Preguntas</h3>
            <form method="POST" action="{{ route('preguntas.store') }}">
                @csrf
                @include('admin.preguntas.partials._form')
                <br>
                <div>
                    <button class="btn btn-success" type="submit">Guardar</button>
                </div>
            </form>
        </div>
    </div>
@endsection
