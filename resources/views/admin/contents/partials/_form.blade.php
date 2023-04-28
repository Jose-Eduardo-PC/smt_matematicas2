<div class="row">
    <div class="form-group col-8">
        <label for="name_cont">Nombre del Contenido</label>
        <input id="name_cont" name="name_cont" type="text" class="form-control form-control-sm"
            value="{{ old('name_cont', $content->name_cont) }}" autocomplete="name_cont" />
        @error('name_cont')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
</div>
<div class="form-group">
    <label for="text_cont">Contenido</label>
    <textarea name="text_cont" id="text_cont" class="form-control">{{ old('text_cont', $content->text_cont) }}</textarea>
    @error('text_cont')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
<div class="row">
    <div class="form-group col-6">
        <label for="image_cont">Imagen del Contenido</label>
        <input type="file" name="image_cont" class="custom-file-input" id="image_cont" accept="image/*"
            onchange="previewFile()">
        @error('image_cont')
            <br><br><br><br>
            <span class="invalid-feedback d-block" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group col-6">
        <div class="custom-file">
            @if ($content->image_cont)
                <img id="preview" src="{{ Storage::url($content->image_cont) }}" height="100"
                    alt="Vista previa de la imagen">
            @else
                <img id="preview" src="/storage/imagenes/imag_default.jpg" height="180"
                    alt="Vista previa de la imagen">
            @endif
        </div>
    </div>
</div>
@if (Route::currentRouteName() == 'content.create-form')
    <input type="hidden" name="theme_id" id="theme_id" value="{{ $themeId }}">
@elseif (Route::currentRouteName() == 'contents.edit')
    <input type="hidden" name="theme_id" id="theme_id" value="{{ $content->theme_id }}">
@endif
