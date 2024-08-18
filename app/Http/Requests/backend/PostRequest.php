<?php

namespace App\Http\Requests\backend;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            // 'user_id' => 'required|exists:users,id',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'sub_title'=>'max:255'
        
        ];
        if ($this->isMethod('post')) {
            $rules['image_file'] = 'required';
        }
        return $rules;
    }
    public function messages():array
    {
        return [
            'title.required'=>'Enter title',
            'title.max'=>'255 characters allowed only',
            'sub_title'=>'255 characters allowed only',
            'description.required'=>'Content is required',
            'image_file.required'=>'please upload image'
        ];
    }
}
