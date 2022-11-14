@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-body">
            <h4>Usuario:</h4>
            <p>{{ $user->name }}</p>
            <h4>Rol:</h4>
            @forelse ($user->roles as $role)
                <p>{{ $role->name }}</p>
            @empty
                <p>No tiene un rol</p>
            @endforelse
        </div>
    </div>
@endsection
