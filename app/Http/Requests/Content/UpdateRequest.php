<?php

namespace App\Http\Requests\Content;

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
            'name_cont' => 'required|string',
            'text_cont' => 'required|string',
            'image_cont' => 'dimensions:min_width=100,max_width=800,min_height=100,max_height=800',
            'theme_id' => 'required|integer',

        ];
    }
}
