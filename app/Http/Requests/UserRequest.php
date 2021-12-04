<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name'                => 'required|string|max:255',
            'email'               => 'required|string|email|unique:users',
            'password'            => 'required|string|min:8|confirmed',
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
                'name.required'               => 'Введите :attribute',
                'name.string'                 => 'Введите корректное :attribute',
                'email.required'              => 'Введите :attribute',
                'email.email'                 => 'Введите корректный :attribute',
                'password.required'           => 'Введите :attribute',
                'password.min'                => 'Минимальная длина пароля :min символов',
                'password.confirmed'          => 'Пароль не подтвержден',
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
                'name'              => 'имя',
                'email'             => 'email',
                'password'          => 'пароль',
                'min'               => 8,
        ];
    }
}
