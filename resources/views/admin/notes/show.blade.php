@extends('layouts.admin_index')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h4>Usuario:</h4>
                            <p>{{ $user->name }} {{ $user->surname }}</p>
                        </div>
                        <div class="col-md-6">
                            @if ($user->avatar)
                                @if (Str::startsWith($user->avatar, 'public/imagenes/imgavatars'))
                                    <img class="imgPr" id="preview" alt="Image placeholder" height="100"
                                        src="{{ Storage::url($user->avatar) }}"
                                        onerror="this.src='/storage/imagenes/avatar.gif'">
                                @else
                                    <img class="imgPr" id="preview" alt="Image placeholder" height="100"
                                        src="{{ Storage::url('avatars/' . basename($user->avatar)) }}"
                                        onerror="this.src='/storage/imagenes/avatar.gif'">
                                @endif
                            @else
                                <img class="imgPr" id="preview" src="/storage/imagenes/avatar.gif" height="100"
                                    alt="Vista previa de la imagen">
                            @endif
                        </div>
                    </div>
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
                    <h4>Fecha de Actualizacion:</h4>
                    <p>{{ $user->updated_at }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            @forelse ($user->test_user as $nota)
                <div class="card">
                    <a href="{{ route('test_show', $nota->test->id) }}" class="card-link">
                        <div class="card-body">
                            <h5>Examenes realizados</h5>
                            <hr>
                            <span><b>Examen:</b> </span><span>{{ $nota->test->name_test }}</span><br>
                            <span><b>Nota: </b></span><span>{{ $nota->points }}</span><br>
                            <span><b>Estado: </b></span><span>{{ $nota->status }}</span><br>
                        </div>
                    </a>
                </div>
            @empty
                <div class="card">
                    <div class="card-body">
                        <span>No hay examenes realizados</span>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
    <style>
        .imgPr {
            border-radius: 15px;
            box-shadow: 10px 10px 5px grey;
        }
    </style>
@endsection
