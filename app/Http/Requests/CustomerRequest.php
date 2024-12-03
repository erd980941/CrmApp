<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
        // return $this->user()->id === $this->route('customer')->user_id;
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
            'email' => 'required|email|unique:customers,email,' . $this->route('customer')->id,
            'phone' => 'nullable|regex:/^\+?[0-9]{10,15}$/',
            'address' => 'nullable|string|max:500', 
            'company' => 'nullable|string|max:255',
        ];
    }

    /**
     * Custom validation messages.
     */
    public function messages(): array
    {
        return [
            'name.required' => 'The name field is required.',
            'email.required' => 'The email field is required.',
            'email.unique' => 'This email is already taken.',
            'phone.string' => 'The phone field must be a valid string.',
            'address.max' => 'The address must not exceed 500 characters.',
            'company.max' => 'The company name must not exceed 255 characters.',
            'phone.regex' => 'The phone number format is invalid.',
        ];
    }
}
