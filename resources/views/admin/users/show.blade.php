@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-6">
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
                    <h4>Correo:</h4>
                    <p>{{ $user->email }}</p>
                    <h4>Fecha de Creacion:</h4>
                    <p>{{ $user->created_at }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    @forelse ($user->notas as $nota)
                        <h4>Examenes realizados</h4>
                        <hr>
                        <span>{{ $nota->examen->title }}</span><br>
                        <span>{{ $nota->nota }}</span><br>
                        <span>{{ $nota->estado }}</span><br>
                    @empty
                        <span>No hay examenes realizados</span>
                    @endforelse
                </div>

            </div>
        </div>
    </div>
@endsection
