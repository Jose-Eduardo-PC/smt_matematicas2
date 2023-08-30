<div class="row">
    <div class="form-group col-md-9">
        <label for="name_activity">Nombre</label>
        <input id="name_activity" name="name_activity" type="text" class="form-control form-control-sm"
            value="{{ old('name_activity', $activity->name_activity) }}" autocomplete="name_activity" />
        @error('name_activity')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    <div class="form-group col-md-3">
        <label for="theme_id">Tema</label>
        <select id="theme_id" class="form-control form-control-sm" name="theme_id">
            <option selected>Selecciona un tema</option>
            @foreach ($themes as $theme)
                <option value="{{ $theme->id }}"
                    {{ old('theme_id', $activity->theme_id) == $theme->id ? 'selected' : '' }}>{{ $theme->name_theme }}
                </option>
            @endforeach
        </select>
    </div>
</div>
<div class="form-group">
    <label for="description">Descripcion</label>
    <textarea name="description" id="description" class="form-control">{{ old('description', $activity->description) }}</textarea>
    @error('description')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
<div class="form-group">
    <label for="link_acti">Link</label>
    <div class="input-group input-group-sm">
        <input id="link_acti" class="form-control" type="text" name="link_acti"
            value="{{ old('link_acti', $activity->link_acti) }}" />
        <span class="input-group-text">@</span>
    </div>
    @error('link_acti')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
