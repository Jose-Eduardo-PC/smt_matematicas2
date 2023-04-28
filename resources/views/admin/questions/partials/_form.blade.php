<div>
    <div class="form-group">
        <label for="statement">Pregunta</label>
        <div class="input-group mb-3">
            <input id="statement" name="statement" type="text" class="form-control form-control-sm"
                value="{{ old('statement', $question->statement) }}" required autocomplete="statement" />
        </div>
        @error('statement')
            <span class="invalid-feedback d-block" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="incisoA">inciso A</label>
        <div class="input-group mb-3">
            <input id="incisoA" name="incisoA" type="text" class="form-control form-control-sm"
                value="{{ old('incisoA', $question->incisoA) }}" required autocomplete="incisoA" />
        </div>
        @error('incisoA')
            <span class="invalid-feedback d-block" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="incisoB">inciso B</label>
        <div class="input-group mb-3">
            <input id="incisoB" name="incisoB" type="text" class="form-control form-control-sm"
                value="{{ old('incisoB', $question->incisoB) }}" required autocomplete="incisoB" />
        </div>
        @error('incisoB')
            <span class="invalid-feedback d-block" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="incisoC">inciso C</label>
        <div class="input-group mb-3">
            <input id="incisoC" name="incisoC" type="text" class="form-control form-control-sm"
                value="{{ old('incisoC', $question->incisoC) }}" required autocomplete="incisoC" />
        </div>
        @error('incisoC')
            <span class="invalid-feedback d-block" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="incisoD">inciso D</label>
        <div class="input-group mb-3">
            <input id="incisoD" name="incisoD" type="text" class="form-control form-control-sm"
                value="{{ old('incisoD', $question->incisoD) }}" required autocomplete="incisoD" />
        </div>
        @error('incisoD')
            <span class="invalid-feedback d-block" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="row">
        <div class="form-group col-3">
            <select class="form-control form-control-sm" name="correct_paragraph">
                <option disabled>Pregunta Correcta</option>
                <option value="A" {{ $question->correct_paragraph == 'A' ? 'selected' : '' }}>A</option>
                <option value="B" {{ $question->correct_paragraph == 'B' ? 'selected' : '' }}>B</option>
                <option value="C" {{ $question->correct_paragraph == 'C' ? 'selected' : '' }}>C</option>
                <option value="D" {{ $question->correct_paragraph == 'D' ? 'selected' : '' }}>D</option>
            </select>
            @error('correct_paragraph')
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    @if (Route::currentRouteName() == 'question.create-form')
        <input type="hidden" name="test_id" id="test_id" value="{{ $testId }}">
    @elseif (Route::currentRouteName() == 'questions.edit')
        <input type="hidden" name="test_id" id="test_id" value="{{ $question->test_id }}">
    @endif
</div>
