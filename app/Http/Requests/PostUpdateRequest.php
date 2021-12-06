<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostUpdateRequest extends FormRequest
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
            'title'                 => 'required|string',
            'body'                  => 'required|string',
            'user_id'               => 'required|exists:users',
            'category_id'           => 'required|exists:categories',
            'post_status_id'        => 'required|exists:post_statuses',
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
            'title'                 => 'title INVALID',
            'body'                  => 'body INVALID',
            'user_id'               => 'user_id INVALID',
            'category_id'           => 'category_id INVALID',
            'post_status_id'        => 'post_status_id INVALID',
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
