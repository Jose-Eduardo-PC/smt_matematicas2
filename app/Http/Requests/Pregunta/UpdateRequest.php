<?php

namespace App\Http\Requests\Pregunta;

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
            'enunciado' => 'required|string',
            'incisoA' => 'required|string',
            'incisoB' => 'required|string',
            'incisoC' => 'required|string',
            'incisoD' => 'required|string',
            'incisoCorrecto' => 'required|string',
            'examen_id' => 'required|integer|exists:examens,id'
        ];
    }
}
