<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

     /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation()
    {
        // Eğer kullanıcı admin veya manager değilse user_id otomatik giriş yapan kullanıcının id'sine atanır
        if (!auth()->user()->hasRole(['admin', 'manager'])) {
            $this->merge([
                'user_id' => auth()->id(),
            ]);
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        return [
            'user_id' => auth()->user()->hasRole(['admin', 'manager']) 
                    ? 'required|exists:users,id' 
                    : 'nullable|exists:users,id',
            // 'customer_id' => 'nullable|exists:customers,id',
            'sales_opportunity_id' => 'nullable|exists:sales_opportunities,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:pending,in_progress,completed',
            'due_date' => 'nullable|date',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'user_id.required' => 'User is required.',
            'user_id.exists' => 'The selected user is invalid.',
            // 'customer_id.exists' => 'The selected customer is invalid.',
            'sales_opportunity_id.exists' => 'The selected sales opportunity is invalid.',
            'title.required' => 'Title is required.',
            'title.max' => 'Title must not exceed 255 characters.',
            'status.required' => 'Status is required.',
            'status.in' => 'Status must be one of the following: pending, in_progress, completed.',
            'due_date.date' => 'Due date must be a valid date.',
        ];
    }
}
