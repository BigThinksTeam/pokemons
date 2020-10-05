<?php

namespace App\Http\Requests;

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
            'name' => 'required|alpha',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
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
