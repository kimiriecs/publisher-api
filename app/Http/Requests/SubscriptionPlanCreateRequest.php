<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubscriptionPlanCreateRequest extends FormRequest
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
            'name'                           => 'required|string|max:255',
            'price'                          => 'required|numeric|gte:0',
            'posts_total_count'              => 'required|numeric|gte:0',
            'subscription_period'            => 'required|date',
            'subscription_plan_status_id'    => 'required|exists:subscription_plan_statuses|unique:subscription_plan_statuses',
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
            'name'                           => 'name INVALID',
            'price'                          => 'price INVALID',
            'posts_total_count'              => 'posts_total_count INVALID',
            'subscription_period'            => 'subscription_period INVALID',
            'subscription_plan_status_id'    => 'subscription_plan_status_id INVALID',
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
