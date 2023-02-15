<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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

        $rules = [
            'name' => 'required', 'max:255',
            'email' => [
                'required', 'email', 'max:255',
                Rule::unique('users')->ignore($this->route('user')->id)
            ],
            'avatar' => 'image',
        ];
        if ($this->filled('password')) {
            $rules['password'] = ['confirmed', 'min:8'];
        }
        return $rules;
    }
}
