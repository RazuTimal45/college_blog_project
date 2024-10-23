<?php

namespace App\Http\Requests\backend;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
        // Default rules
        $rules = [
            'name' => 'required|max:255',
            'email' => 'max:1000|email', 
            'phone' => 'nullable|regex:/(\+977)?[9][6-9]\d{8}/', 
            'address' => 'required',
            'message' => 'max:1000'
        ];
        

        return $rules;
    }

    /**
     * Get the custom validation messages for the request.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Please enter the category name.',
            'name.max' => 'The category name must be less than 255 characters.',
            'email.max'=>'The email must be of 1000 characters',
            'email.email'=>'The email must be valid',
            'phone.regex'=>'The phone number must be valid',
            'address.required'=>'Please enter your address',
            'message.max' => 'The description must be less than 1000 characters.',
        ];
         
    }
}
