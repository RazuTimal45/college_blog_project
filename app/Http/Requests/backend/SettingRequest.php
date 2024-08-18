<?php

namespace App\Http\Requests\backend;

use Illuminate\Foundation\Http\FormRequest;


class SettingRequest extends FormRequest
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
            'site_name' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'phone' => 'nullable|starts_with:97,98|digits:10',
            'meta_keyword'=>'nullable|max:150',
            'meta_description'=>'nullable|max:255'
        ];

        // Conditionally add image validation only for the create action
        if ($this->isMethod('post')) {
            $rules['fav_icon_file'] = 'required';
            $rules['logo_header_file'] = 'required';
            $rules['logo_footer_file'] = 'required';
        }
        return $rules;
    }
    public function messages():array
    {
        return [
            'site_name.required' => 'Please enter your site name.',
            'title.required' => 'Title is required.',
            'email.required' => 'Email is required.',
            'email.email' => 'Invalid email format.',
            'address.required' => 'Address is required.',
            'phone.starts_with' => 'Phone number must start with 97 or 98.',
            'phone.digits' => 'Phone number must be exactly 10 digits long.',
            'fav_icon_file'=>'please upload fav icon image',
            'logo_header_file.required'=>'please upload header image',
            'logo_footer_file.required'=>'please upload footer image',
            'meta_keyword.max'=>'Meta keyword cannot be more than 150 characters',
            'meta_description.max'=>'Meta description cannot be more than 255 characters'
        ];
    }
}
