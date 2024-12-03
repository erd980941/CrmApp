<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordRequest extends FormRequest
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
            'old_password' => 'required|string',
            'new_password' => 'required|string|min:8|confirmed',
        ];
    }

    public function messages(): array
    {
        return [
            'old_password.required' => 'Mevcut şifre zorunludur.',
            'old_password.string' => 'Mevcut şifre geçerli bir metin olmalıdır.',
            'new_password.required' => 'Yeni şifre zorunludur.',
            'new_password.string' => 'Yeni şifre geçerli bir metin olmalıdır.',
            'new_password.min' => 'Yeni şifre en az 8 karakter olmalıdır.',
            'new_password.confirmed' => 'Yeni şifre ve onay şifresi uyuşmuyor.',
        ];
    }
}
