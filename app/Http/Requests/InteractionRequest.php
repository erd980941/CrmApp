<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InteractionRequest extends FormRequest
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
            'customer_id' => 'required|exists:customers,id', // customer_id'yi zorunlu ve customers tablosunda var olması gerekir
            'user_id' => 'required|exists:users,id', // user_id'yi zorunlu ve users tablosunda var olması gerekir
            'type' => 'required|in:call,email,meeting,other', // 'type' değerinin yalnızca belirli değerlerden biri olmasına izin verilir
            'notes' => 'nullable|string', // notes alanı isteğe bağlı ve string türünde olmalıdır
            'interaction_date' => 'nullable|date|after_or_equal:today', // interaction_date isteğe bağlı ancak geçerli bir tarih olmalı
        ];
    }

    /**
     * Get the custom validation messages for the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'customer_id.required' => 'The customer field is required.',
            'customer_id.exists' => 'The selected customer does not exist.',
            'user_id.required' => 'The user field is required.',
            'user_id.exists' => 'The selected user does not exist.',
            'type.required' => 'The type field is required.',
            'type.in' => 'The selected type is invalid.',
            'notes.string' => 'The notes must be a string.',
            'interaction_date.date' => 'The interaction date must be a valid date.',
            'interaction_date.after_or_equal' => 'The interaction date must be today or a future date.',
        ];
    }
}
