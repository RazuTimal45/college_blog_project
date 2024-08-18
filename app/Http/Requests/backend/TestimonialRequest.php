<?php

namespace App\Http\Requests\backend;

use Illuminate\Foundation\Http\FormRequest;


class TestimonialRequest extends FormRequest
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
        $rules = [
            'description' => 'required',
            'name'=>'required'
        ];

        // Conditionally add image validation only for the create action
        if ($this->isMethod('post')) {
            $rules['image_file'] = 'required';
        }

        return $rules;
    }
    public function messages():array
    {
        return [
            'name.required'=>'Enter your name',
            'description.required' => 'Enter description.',
            'image_file.required' => ' Please upload image.'
        ];
    }
}
