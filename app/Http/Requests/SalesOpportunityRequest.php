<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SalesOpportunityRequest extends FormRequest
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
            'customer_id' => 'required|exists:customers,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'value' => 'nullable|numeric',
            'status' => 'required|in:open,won,lost',
        ];
    }

    /**
     * Get the custom messages for validation errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'customer_id.required' => 'The customer field is required.',
            'customer_id.exists' => 'The selected customer does not exist.',
            'title.required' => 'The title field is required.',
            'status.required' => 'The status field is required.',
            'status.in' => 'The status must be one of the following: open, won, lost.',
        ];
    }
}
