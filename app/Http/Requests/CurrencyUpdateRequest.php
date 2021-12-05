<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CurrencyUpdateRequest extends FormRequest
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
            'name'            => 'required|string|min:3|max:255',
            'symbol'          => 'required|string|min:8|max:8', // 'regex:\\\\u[0-9A-Fa-f]{4}'
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
            'name'          => 'name INVALID',
            'symbol'        => 'symbol INVALID',
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
                // 'name'              => 'имя',
                // 'email'             => 'email',
                // 'password'          => 'пароль',
                // 'min'               => 8,
        ];
    }
}
