@extends('layouts.admin_create')
@section('content')
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('questions.update', $question) }}" enctype="multipart/form-data">
                @csrf
                @method('put')
                @include('admin.questions.partials._form')
                <br>
                <div>
                    <button class="btn btn-success" type="submit">Guardar</button>
                </div>
            </form>
        </div>
    </div>
@endsection
