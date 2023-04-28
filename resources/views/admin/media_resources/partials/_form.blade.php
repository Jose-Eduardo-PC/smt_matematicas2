<div class="row">
    <div class="form-group col-md-9">
        <label for="link_video">Link del Recurso</label>
        <div class="input-group input-group-sm">
            <input id="link_video" class="form-control" type="text" name="link_video"
                value="{{ old('link_video', $media_resource->link_video) }}" />
            <span class="input-group-text">@</span>
        </div>
        @error('link_video')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    <div class="form-group col-md-3">
        <label for="resource_type">Tipo de Recurso</label>
        <select id="resource_type" class="form-control form-control-sm" name="resource_type">
            <option value="" disabled>Elige una opción</option>
            <option value="{{ $media_resource->resource_type }}" selected>{{ $media_resource->resource_type }}</option>
            <option value="video">video</option>
            <option value="pdf">PDF</option>
            <option value="imagen">Imagen</option>
        </select>
    </div>
    @error('resource_type')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
<div class="form-group">
    <div class="form-group">
        <select id="theme_id" class="form-control form-control-sm" name="theme_id">
            <?php foreach($themes as $theme): ?>
            <option value="<?= $theme->id ?>" <?= $theme->id == $media_resource->theme_id ? 'selected' : '' ?>>
                <?= $theme->name_theme ?></option>
            <?php endforeach; ?>
        </select>
        @error('theme_id')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    @error('theme_id')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
<div class="form-group">
    <label for="description">Descripcion</label>
    <textarea name="description" id="description" class="form-control">{{ old('description', $media_resource->description) }}</textarea>
    @error('description')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
