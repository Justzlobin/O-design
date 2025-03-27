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
            'first_name' => 'required|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'phone' => 'required|regex:/^\+?[0-9]{10,15}$/',
            'e-mail' => 'nullable|email|max:255',
            'comment' => 'nullable|string|max:1000',
            'file' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:10240',
        ];
    }

    public function messages()
    {
        return [
            'first_name.required' => 'First name is required.',
            'first_name.string' => 'First name must be a valid string.',
            'first_name.max' => 'First name can\'t exceed 255 characters.',

            'last_name.required' => 'Last name is required.',
            'last_name.string' => 'Last name must be a valid string.',
            'last_name.max' => 'Last name can\'t exceed 255 characters.',

            'phone.required' => 'Phone number is required.',
            'phone.regex' => 'Phone number is invalid. Please provide a valid phone number.',

            'e-mail.required' => 'Email is required.',
            'e-mail.email' => 'Please provide a valid email address.',
            'e-mail.max' => 'Email can\'t exceed 255 characters.',

            'comment.max' => 'Comment can\'t exceed 1000 characters.',

            'file.mimes' => 'Allowed file types are jpg, jpeg, png, and pdf.',
            'file.max' => 'File size can\'t exceed 10MB.',
        ];
    }
}
