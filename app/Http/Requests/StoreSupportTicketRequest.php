<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSupportTicketRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'customer_name' => 'required|string|regex:/^[a-zA-Z\s\'-]+$/',
            'problem_description' => 'required|string|min:10',
            'phone_number' => 'required|numeric|digits:10',
            'email' => 'required|email',
        ];
    }

    public function messages(): array
    {
        return [
            'customer_name.regex' => 'Please provide a valid name.',
            'phone_number.numeric' => 'Please provide a valid phone number.',
            'phone_number.digits' => 'Please provide a valid phone number.',
            'email' => 'Please provide a valid email address.'
        ];
    }
}
