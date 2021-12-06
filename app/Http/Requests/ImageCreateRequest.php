<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImageCreateRequest extends FormRequest
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
            'url'           => 'required|url|min:3|max:255',
            'description'   => 'required|string|min:3|max:300',
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
            'url'           => 'url INVALID',
            'description'   => 'description INVALID',
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
