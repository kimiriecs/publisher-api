<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserLoginRequest extends FormRequest
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
            'email'       => 'required|string|email',
            'password'    => 'required|string|min:8',
        ];
    }

    
    /**
     * Get the error messages for the defined validation rules that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
                'email.required'          => 'Введите :attribute',
                'email.email'             => 'Введите корректный :attribute',
                'password.required'       => 'Введите :attribute',
                'password.min'            => 'Минимальная длина пароля :min символов',
        ];
    }

    /**
     * Get the custom attributes for the defined validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
                'email'     => 'email',
                'min'       => 8,
        ];
    }
}
