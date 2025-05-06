<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactUsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:17|regex:/^\+380\(\d{2}\)\d{3}-\d{2}-\d{2}$/',
            'e-mail' => 'nullable|email|max:255',
            'comment' => 'nullable|string|max:1000',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => __('contact-us.validation.name_required'),
            'name.string' => __('contact-us.validation.name_string'),
            'name.max' => __('contact-us.validation.name_max'),

            'phone.required' => __('contact-us.validation.phone_required'),
            'phone.regex' => __('contact-us.validation.phone_format'),
            'phone.max' => __('contact-us.validation.phone_max'),

            'e-mail.email' => __('contact-us.validation.email_format'),
            'e-mail.max' => __('contact-us.validation.email_max'),

            'comment.max' => __('contact-us.validation.comment_max'),
        ];
    }
}
