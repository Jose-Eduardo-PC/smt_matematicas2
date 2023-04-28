<div class="row">
    <div class="form-group col-6">
        <label for="name_theme">Nombre del Tema</label>
        <input id="name_theme" name="name_theme" type="text" class="form-control form-control-sm"
            value="{{ old('name_theme', $theme->name_theme) }}" autocomplete="name_theme" />
        @error('name_theme')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
</div>
<div class="form-group">
    <label for="description">Descripción</label>
    <textarea name="description" id="description" class="form-control">{{ old('description', $theme->description) }}</textarea>
    @error('description')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
<script src="https://cdn.ckeditor.com/ckeditor5/37.0.1/classic/ckeditor.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/37.0.1/classic/translations/es.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#description'), {
            language: 'es'
        })
        .then(editor => {
            console.log(editor);
        })
        .catch(error => {
            console.error(error);
        });
</script>
<style>
    .ck-editor__editable_inline {
        min-height: 150px;
    }
</style>
