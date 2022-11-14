<?php

namespace App\Http\Requests\Curso;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string|max:255',
            'contenido' => 'required|string|max:255',
            'ejemplo' => 'required|string|max:255',
            'link' => 'required|string|max:255',
            'imagenc' => 'required|image',
            'imagene' => 'required|image',
        ];
    }
}
