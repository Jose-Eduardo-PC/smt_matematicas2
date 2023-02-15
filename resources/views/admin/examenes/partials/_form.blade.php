<div>
    <div class="form-group">
        <label for="title">Titulo</label>
        <div class="input-group mb-3">
            <input id="title" name="title" type="text" class="form-control form-control-sm"
                value="{{ old('title', $examene->title) }}" required autocomplete="title" />
        </div>
        @error('title')
            <span class="invalid-feedback d-block" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="contenido">Contenido</label>
        <div class="input-group mb-3">
            <textarea id="contenido" name="contenido" class="form-control form-control-sm" cols="30" rows="10">{{ old('contenido', $examene->contenido) }}</textarea>
        </div>
        @error('contenido')
            <span class="invalid-feedback d-block" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
