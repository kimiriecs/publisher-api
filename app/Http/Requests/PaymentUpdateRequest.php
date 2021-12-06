<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaymentUpdateRequest extends FormRequest
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
            'encryption'            => 'required|numeric|max:255',
            'amount'                => 'required|numeric|gte:0',
            'user_id'               => 'required|exists:payments',
            'subscription_id'       => 'required|exists:payments',
            'payment_status_id'     => 'required|exists:payments',
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
            'encryption'            => 'encryption INVALID',
            'amount'                => 'amount INVALID',
            'user_id'               => 'user_id INVALID',
            'subscription_id'       => 'subscription_id INVALID',
            'payment_status_id'     => 'payment_status_id INVALID',
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
