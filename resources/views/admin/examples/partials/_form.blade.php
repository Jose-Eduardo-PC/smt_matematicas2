<div class="form-group">
    <label for="text_ejm">Contenido</label>
    <textarea name="text_ejm" id="text_ejm" class="form-control">{{ old('text_ejm', $example->text_ejm) }}</textarea>
    @error('text_ejm')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
<div class="row">
    <div class="form-group col-6">
        <label for="image_ejm">Imagen del Ejemplo</label>
        <input type="file" name="image_ejm" class="custom-file-input" id="image_ejm" accept="image/*"
            onchange="previewFile()">
        @error('image_ejm')
            <br><br><br><br>
            <span class="invalid-feedback d-block" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group col-6">
        <div class="custom-file">
            @if ($example->image_ejm)
                <img id="preview" src="{{ Storage::url($example->image_ejm) }}" height="100"
                    alt="Vista previa de la imagen">
            @else
                <img id="preview" src="/storage/imagenes/imag_default.jpg" height="180"
                    alt="Vista previa de la imagen">
            @endif
        </div>
    </div>
</div>
<input type="hidden" name="content_id" id="content_id" value="{{ $contentId }}">
