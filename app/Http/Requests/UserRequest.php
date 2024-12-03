<?php

namespace App\Http\Requests;

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
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $this->user, 
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:admin,sales,support,manager',
            'phone' => 'nullable|string|max:15',
            'address' => 'nullable|string|max:255',
            'status' => 'required|in:active,inactive,suspended,pending',
        ];
    }
    
    /**
     * Get the validation messages that should be returned for the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'İsim alanı zorunludur.',
            'email.required' => 'E-posta adresi zorunludur.',
            'email.email' => 'Geçerli bir e-posta adresi giriniz.',
            'email.unique' => 'Bu e-posta adresi zaten kayıtlı.',
            'password.required' => 'Şifre alanı zorunludur.',
            'password.min' => 'Şifre en az 8 karakter olmalıdır.',
            'password.confirmed' => 'Şifreler uyuşmuyor.',
            'role.required' => 'Kullanıcı rolü zorunludur.',
            'role.in' => 'Geçersiz kullanıcı rolü seçildi.',
            'phone.max' => 'Telefon numarası en fazla 15 karakter olabilir.',
            'address.max' => 'Adres en fazla 255 karakter olabilir.',
            'status.required' => 'Durum seçimi zorunludur.',
            'status.in' => 'Geçersiz durum seçimi.',
        ];
    }
}
