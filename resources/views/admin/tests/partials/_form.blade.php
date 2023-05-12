<div>
    <div class="row">
        <div class="form-group col-md-9">
            <label for="name_test">Titulo</label>
            <div class="input-group mb-3">
                <input id="name_test" name="name_test" type="text" class="form-control form-control-sm"
                    value="{{ old('name_test', $test->name_test) }}" required autocomplete="name_test" />
            </div>
            @error('name_test')
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group col-md-3">
            <label for="theme_id">Curso</label>
            <select id="theme_id" class="form-control form-control-sm" name="theme_id">
                <option selected>Selecciona un Tema</option>
                @foreach ($themes as $theme)
                    <option value="{{ $theme->id }}"
                        {{ old('theme_id', $test->theme_id) == $theme->id ? 'selected' : '' }}>
                        {{ $theme->name_theme }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="content">Contenido</label>
        <div class="input-group mb-3">
            <textarea id="content" name="content" class="form-control form-control-sm" cols="30" rows="10">{{ old('content', $test->content) }}</textarea>
        </div>
        @error('content')
            <span class="invalid-feedback d-block" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
