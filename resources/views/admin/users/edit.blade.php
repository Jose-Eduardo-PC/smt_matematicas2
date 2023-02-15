@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('users.update', $user) }} " enctype="multipart/form-data">
                @csrf
                @method('put')
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
