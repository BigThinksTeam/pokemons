<?php

namespace App\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

class RegisterSave extends FormRequest
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
            'name' => 'required',
            'email' => 'bail|required|email|unique:users,email',
            'password' => 'bail|required|min:6',
        ];
    }

    /**
     * @return array|string[]
     */
    public function attributes()
    {
        return [
            'name' => 'name',
            'email' => 'email address',
            'password' => 'password'
        ];
    }

    public function messages()
    {
        return [
            'email.unique' => 'This email address has already been taken'
        ];
    }
}
