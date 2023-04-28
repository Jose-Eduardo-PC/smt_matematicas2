<?php

namespace App\Http\Requests\User;

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
            'name' => 'required|max:255',
            'surname' => 'required|max:255',
            'avatar' => 'dimensions:min_width=200,max_width=500,min_height=200,max_height=500',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',

        ];
    }
}
