<div class="form-group">
    <div class="form-group">
        <label for="nombre">Nombre</label>
        <input id="nombre" name="nombre" type="text" class="form-control form-control-sm"
            value="{{ old('nombre', $actividade->nombre) }}" autocomplete="nombre" />
        @error('nombre')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    <div class="form-group">
        <select class="form-select" aria-label="Curso" name="curso_id">
            <option selected>Cursos</option>
            @foreach ($cursos as $curso)
                <option value={{ $curso->id }}>{{ $curso->titulo }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="descripcion">Descripcion</label>
        <input id="descripcion" name="descripcion" type="text" class="form-control form-control-sm"
            value="{{ old('descripcion', $actividade->descripcion) }}" autocomplete="descripcion" />
        @error('descripcion')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    <div class="form-group">
        <label for="link">Link</label>
        <div class="input-group">
            <input id="link" class="form-control form-control-sm" type="text" name="link"
                value="{{ old('link', $actividade->link) }}" />
            <span class="input-group-text form-control-sm">@</span>
        </div>
        @error('link')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
</div>
