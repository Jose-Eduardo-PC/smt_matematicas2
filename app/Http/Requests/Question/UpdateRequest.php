<?php

namespace App\Http\Requests\Question;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'statement' => 'required|string',
            'incisoA' => 'required|string',
            'incisoB' => 'required|string',
            'incisoC' => 'required|string',
            'incisoD' => 'required|string',
            'correct_paragraph' => 'required|string',
            'test_id' => 'required|integer|exists:tests,id'
        ];
    }
}
