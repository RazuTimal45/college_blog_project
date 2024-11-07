<?php

namespace App\Http\Requests\backend;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:5', 'confirmed'],
            'bio' => ['nullable', 'string', 'max:1000'], 
        ];
    }

    /**
     * Get the custom messages for validation errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Enter your name.',
            'name.string' => 'Name must be a valid string.',
            'name.max' => 'Name cannot exceed 255 characters.',

            'email.required' => 'Enter your email address.',
            'email.string' => 'Email must be a valid string.',
            'email.email' => 'Enter a valid email address.',
            'email.max' => 'Email cannot exceed 255 characters.',
            'email.unique' => 'This email address is already registered.',

            'password.required' => 'Enter a password.',
            'password.string' => 'Password must be a valid string.',
            'password.min' => 'Password must be at least 5 characters.',
            'password.confirmed' => 'Password confirmation does not match.',

            'bio.string' => 'Bio must be a valid string.',
            'bio.max' => 'Bio cannot exceed 1000 characters.',
        ];
    }
}
