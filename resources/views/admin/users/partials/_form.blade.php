<div class="row">
    <div class="form-group col-6">
        <label for="name">Nombre</label>
        <div class="input-group mb-3">
            <input id="name" name="name" type="text" class="form-control form-control-sm"
                value="{{ old('name', $user->name) }}" required autocomplete="name" />
        </div>
        @error('name')
            <span class="invalid-feedback d-block" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group col-6">
        <label for="email">Correo Electronico</label>
        <input id="email" name="email" type="email" placeholder="email@example.com"
            class="form-control form-control-sm" value="{{ old('email', $user->email) }}" required />
        @error('email')
            <span class="invalid-feedback d-block" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="col-6">
        <label for="password">Password</label>
        <input id="password" name="password" type="password" class="form-control form-control-sm"
            autocomplete="new-password" />
        <small id="password" class="form-text text-muted">
            tu contraseña debe ser de 8 digitos como minimo.
        </small>
        @error('password')
            <span class="invalid-feedback d-block" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="col-6">
        <label for="password_confirmation">Confirmar Contraseña</label>
        <input id="password_confirmation" name="password_confirmation" type="password"
            class="form-control form-control-sm" autocomplete="new-password" />
        <small id="password_confirmation" class="form-text text-muted">
            tu contraseña deben coincider.
        </small>
        @error('password_confirmation')
            <span class="invalid-feedback d-block" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group col-6">
        <br>
        <label for="roles">Roles</label>
        @foreach ($roles as $role)
            <div class="checkbox">
                <label>
                    <input name="roles[]" type="checkbox" value="{{ $role->name }}"
                        {{ $user->roles->contains($role->id) ? 'checked' : '' }}>
                    {{ $role->name }}
                    <br>
                </label>
            </div>
        @endforeach
    </div>
    <div class="col-6">
        <br>
        <label for="avatar">Avatar</label>
        <input type="file" name="avatar" class="form-control form-control-sm" id="avatar" accept="image/*">
        @error('avatar')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
</div>
