<?php

namespace App\Http\Requests\backend;

use Illuminate\Foundation\Http\FormRequest;

class NoticeRequest extends FormRequest
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
            'message' => 'required',
        ];

        return $rules;
    }
    public function messages():array
    {
        return [
          'message.required'=>'message is required',
        ];
    }
}
