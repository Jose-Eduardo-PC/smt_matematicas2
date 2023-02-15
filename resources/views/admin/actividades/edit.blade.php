@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('actividades.update', $actividade) }}" enctype="multipart/form-data">
                @csrf
                @method('put')
                @include('admin.actividades.partials._form')
                <br>
                <div>
                    <button class="btn btn-success" type="submit">Guardar</button>
                </div>
            </form>
        </div>
    </div>
@endsection
