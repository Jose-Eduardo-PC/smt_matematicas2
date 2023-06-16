<?php

namespace App\Http\Requests\Example;

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
            'text_ejm' => 'required|string',
            'image_ejm' => 'dimensions:min_width=200,max_width=800,min_height=100,max_height=800',
            'content_id' => 'required|integer',
        ];
    }
}
