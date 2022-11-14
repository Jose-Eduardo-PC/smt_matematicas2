<div class="form-group">
    <div class="row">
        <div class="col-5">
            <label for="titulo">Titulo</label>
            <input id="titulo" name="titulo" type="text" class="form-control form-control-sm"
                value="{{ old('titulo', $curso->titulo) }}" autocomplete="titulo" />
            @error('titulo')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="col-7">
            <label for="descripcion">Descripcion</label>
            <input id="descripcion" name="descripcion" type="text" class="form-control form-control-sm"
                value="{{ old('descripcion', $curso->descripcion) }}" autocomplete="descripcion" />
            @error('descripcion')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
    </div>
</div>
<div class="form-group">
    <label for="contenido">Contenido</label>
    <textarea name="contenido" id="contenido" rows="10">{{ old('descripcion', $curso->contenido) }}</textarea>
    @error('contenido')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="form-group">
    <label for="ejemplo">Ejemplo</label>
    <textarea name="ejemplo" id="ejemplo" rows="10">{{ old('ejemplo', $curso->ejemplo) }}</textarea>
    @error('ejemplo')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
<div class="row">
    <div class="col-5">
        <label for="link">Link</label>
        <div class="input-group">
            <input id="link" class="form-control form-control-sm" type="text" name="link"
                value="{{ old('link', $curso->link) }}" />
            <span class="input-group-text form-control-sm">@</span>
        </div>
        @error('link')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    <div class="col-3">
        <label for="imagenc">imagen del contenido</label>
        <input type="file" name="imagenc" class="form-control form-control-sm" id="imagenc" accept="image/*">
        @error('imagenc')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    <div class="col-3">
        <label for="imagene">imagen del ejemplo</label>
        <input type="file" name="imagene" class="form-control form-control-sm" id="imagene" accept="image/*">
        @error('imagene')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
</div>

<script src="https://cdn.ckeditor.com/ckeditor5/35.2.1/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#contenido', ))
        .then(editor => {
            console.log(editor);
        })
        .catch(error => {
            console.error(error);
        });
    ClassicEditor
        .create(document.querySelector('#ejemplo'))
        .then(editor => {
            console.log(editor);
        })
        .catch(error => {
            console.error(error);
        });
</script>
