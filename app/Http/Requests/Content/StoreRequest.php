<?php

namespace App\Http\Requests\Content;

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
            'name_cont' => 'required|string',
            'image_cont' => 'required|dimensions:min_width=100,max_width=800,min_height=100,max_height=800',
            'text_cont' => 'required|string',
            'theme_id' => 'required|integer',

        ];
    }
}
