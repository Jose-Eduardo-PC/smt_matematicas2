<?php

namespace App\Http\Requests\Media_resource;

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
            'link_video' => ['sometimes', function ($attribute, $value, $fail) {
                if (!filter_var($value, FILTER_VALIDATE_URL) && !file_exists($value)) {
                    $fail($attribute . ' debe ser una URL válida o una ruta de archivo existente.');
                }
            }],
            'description' => 'sometimes|string',
            'resource_type' => 'sometimes|string',
            'theme_id' => 'sometimes|integer',
        ];
    }
}
