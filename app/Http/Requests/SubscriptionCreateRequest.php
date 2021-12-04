<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubscriptionCreateRequest extends FormRequest
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
            'encryption'                => 'required|numeric|max:255',
            'posts_used_count'          => 'required|numeric|gte:0',
            'remains'                   => 'required|numeric|gte:0',
            'started_at'                => 'required|date',
            'finished_at'               => 'required|date',
            'user_id'                   => 'required|exists:users|unique:users',
            'subscription_plan_id'      => 'required|exists:subscription_plans|unique:subscription_plans',
            'subscription_status_id'    => 'required|exists:subscription_statuses|unique:subscription_statuses',
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
            'encryption'                => 'encryption INVALID',
            'posts_used_count'          => 'posts_used_count INVALID',
            'remains'                   => 'remains INVALID',
            'started_at'                => 'started_at INVALID',
            'finished_at'               => 'finished_at INVALID',
            'user_id'                   => 'user_id INVALID',
            'subscription_plan_id'      => 'subscription_plan_id INVALID',
            'subscription_status_id'    => 'subscription_status_id INVALID',
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
