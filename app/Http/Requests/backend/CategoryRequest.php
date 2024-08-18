<?php

namespace App\Http\Requests\backend;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'description' => 'max:1000',
        ];

        if ($this->isMethod('post')) {
            $rules['image_file'] = 'required|mimes:png,jpg,jpeg';
        }

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
            'image_file.required' => 'The image file is required.',
            'image_file.mimes' => 'The image file must be a file of type: png, jpg, jpeg.',
            'description.max' => 'The description must be less than 1000 characters.',
        ];
    }
}
