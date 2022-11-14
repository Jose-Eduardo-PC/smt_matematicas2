@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-body">
            <h3 class="text-center my-3">Crear nuevo Curso</h3>
            <form method="POST" action="{{ route('cursos.store') }}" enctype="multipart/form-data">
                @csrf
                @include('admin.cursos.partials._form')
                <br>
                <div>
                    <button class="btn btn-success" type="submit">Guardar</button>
                </div>
            </form>
        </div>
    </div>
@endsection
