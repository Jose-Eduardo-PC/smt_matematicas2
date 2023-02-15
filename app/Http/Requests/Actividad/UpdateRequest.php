<?php

namespace App\Http\Requests\Actividad;

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
            'nombre' => 'string|max:255',
            'descripcion' => 'string|max:255',
            'link' => 'string|max:255',
            'curso_id' => 'string|max:255',
        ];
    }
}
