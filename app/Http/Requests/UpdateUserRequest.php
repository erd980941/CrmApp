<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $this->route('user')->id,
            'role' => 'required|in:admin,sales,support,manager',
            'phone' => 'nullable|string|max:15',
            'address' => 'nullable|string|max:255',
            'status' => 'required|in:active,inactive,suspended,pending',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'İsim alanı zorunludur.',
            'email.required' => 'E-posta adresi zorunludur.',
            'email.email' => 'Geçerli bir e-posta adresi giriniz.',
            'email.unique' => 'Bu e-posta adresi zaten kullanılıyor.',
            'role.required' => 'Kullanıcı rolü zorunludur.',
            'role.in' => 'Geçersiz bir kullanıcı rolü seçildi.',
            'phone.max' => 'Telefon numarası en fazla 15 karakter olabilir.',
            'address.max' => 'Adres en fazla 255 karakter olabilir.',
            'status.required' => 'Durum alanı zorunludur.',
            'status.in' => 'Geçersiz durum seçimi.',
        ];
    }
}
