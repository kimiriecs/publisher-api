<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRegisterRequest extends FormRequest
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
            'first_name'    => 'required|string|max:255',
            'last_name'     => 'required|string|max:255',
            'email'         => 'required|string|email|unique:users',
            'password'      => 'required|string|min:8|confirmed',
            'nikname'       => 'string|min:3|max:30',
            'phone'         => 'string|max:20',
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
                'first_name.required'   => 'Введите :attribute',
                'first_name.string'     => 'Введите корректное :attribute',
                'last_name.required'    => 'Введите :attribute',
                'last_name.string'      => 'Введите корректное :attribute',
                'email.required'        => 'Введите :attribute',
                'email.email'           => 'Введите корректный :attribute',
                'password.required'     => 'Введите :attribute',
                'password.min'          => 'Минимальная длина пароля :min символов',
                'password.confirmed'    => 'Пароль не подтвержден',
                'nikname'               => 'nikname INVALID',
                'phone'                 => 'phone INVALID',
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
                'first_name'        => 'имя',
                'last_name'         => 'фамилия',
                'email'             => 'email',
                'password'          => 'пароль',
                'min'               => 8,
        ];
    }
}
