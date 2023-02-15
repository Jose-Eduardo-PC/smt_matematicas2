<div>
    <div class="form-group">
        <label for="enunciado">enunciado</label>
        <div class="input-group mb-3">
            <input id="enunciado" name="enunciado" type="text" class="form-control form-control-sm"
                value="{{ old('enunciado', $pregunta->enunciado) }}" required autocomplete="enunciado" />
        </div>
        @error('enunciado')
            <span class="invalid-feedback d-block" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="incisoA">incisoA</label>
        <div class="input-group mb-3">
            <input id="incisoA" name="incisoA" type="text" class="form-control form-control-sm"
                value="{{ old('incisoA', $pregunta->incisoA) }}" required autocomplete="incisoA" />
        </div>
        @error('incisoA')
            <span class="invalid-feedback d-block" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="incisoB">incisoB</label>
        <div class="input-group mb-3">
            <input id="incisoB" name="incisoB" type="text" class="form-control form-control-sm"
                value="{{ old('incisoB', $pregunta->incisoB) }}" required autocomplete="incisoB" />
        </div>
        @error('incisoB')
            <span class="invalid-feedback d-block" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="incisoC">incisoC</label>
        <div class="input-group mb-3">
            <input id="incisoC" name="incisoC" type="text" class="form-control form-control-sm"
                value="{{ old('incisoC', $pregunta->incisoC) }}" required autocomplete="incisoC" />
        </div>
        @error('incisoC')
            <span class="invalid-feedback d-block" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="incisoD">incisoD</label>
        <div class="input-group mb-3">
            <input id="incisoD" name="incisoD" type="text" class="form-control form-control-sm"
                value="{{ old('incisoD', $pregunta->incisoD) }}" required autocomplete="incisoD" />
        </div>
        @error('incisoD')
            <span class="invalid-feedback d-block" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="row">
        <div class="form-group col-3">
            <select class="form-control form-control-sm" name="incisoCorrecto">
                <option selected>Pregunta Correcta</option>
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>
                <option value="D">D</option>

            </select>
            @error('incisoCorrecto')
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <input type="hidden" name="examen_id" value="{{ $id }}">
</div>
