@extends('layouts.admin_show')

<Head>
    <title>Ver Usuario</title>
</Head>

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
                                <img id="preview" alt="Image placeholder" height="100"
                                    src="{{ Storage::url(Auth::user()->avatar) }}"
                                    onerror="this.src='/storage/imagenes/avatar.gif'">
                            @else
                                <img id="preview" src="/storage/imagenes/avatar.gif" height="100"
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
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    @forelse ($user->theme_user as $nota)
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
