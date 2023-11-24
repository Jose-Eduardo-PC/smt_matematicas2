<div class="row">
    <div class="form-group col-md-3">
        <div>
            <label for="resource_type">Tipo de Recurso</label>
            <select id="resource_type" class="form-control form-control-sm" name="resource_type">
                <option value="default"
                    {{ old('resource_type', $media_resource->resource_type ?? '') == 'default' ? 'selected' : '' }}>
                    Elige
                    una opción</option>
                <option value="video"
                    {{ old('resource_type', $media_resource->resource_type ?? '') == 'video' ? 'selected' : '' }}>video
                </option>
                <option value="pdf"
                    {{ old('resource_type', $media_resource->resource_type ?? '') == 'pdf' ? 'selected' : '' }}>PDF
                </option>
                <option value="imagen"
                    {{ old('resource_type', $media_resource->resource_type ?? '') == 'imagen' ? 'selected' : '' }}>
                    Imagen
                </option>
            </select>
        </div>
        <div>
            @error('resource_type')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

    </div>
    <div class="form-group col-md-9">
        <label for="link_input">Link del Recurso</label>
        <div class="input-group input-group-sm">
            <input id="link_input" class="form-control" type="text" name="link_video" />
            <span class="input-group-text">@</span>
        </div>
        <div>
            <label id="file_name"></label>
            <br>
            <input id="file_input" type="file" name="link_video" accept=".pdf,image/*" />
            <img id="resource_icon" src="\storage\imagenes\imag_default.jpg" alt="Icono de recurso multimedia"
                style="display: none; width: 100px; height: 100px;" />
        </div>
        <div>
            @error('link_video')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
    </div>
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
