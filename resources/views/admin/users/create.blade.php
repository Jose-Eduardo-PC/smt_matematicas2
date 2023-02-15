@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-body">
            <h3 class="text-center my-3">Registrar usuario</h3>
            <form method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data">
                @csrf

                @include('admin.users.partials._form')
                <br>
                <div>
                    <a class="btn btn-secondary" href="{{ route('login') }}">Ya registrado?</a>
                    <button class="vrd btn btn-success" type="submit">Registrar</button>
                </div>
            </form>
        </div>
    </div>
@endsection
