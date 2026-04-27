<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMessageRequest extends FormRequest
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
            'sender_name' => ['required', 'string', 'max:255'],
            'sender_email' => ['required', 'email', 'max:255'],
            'content' => ['required', 'string', 'max:5000'],
        ];
    }

    /**
     * Get custom validation messages.
     */
    public function messages(): array
    {
        return [
            'sender_name.required' => 'Nama wajib diisi.',
            'sender_email.required' => 'Email wajib diisi.',
            'sender_email.email' => 'Format email tidak valid.',
            'content.required' => 'Isi pesan wajib diisi.',
            'content.max' => 'Isi pesan maksimal 5000 karakter.',
        ];
    }
}
