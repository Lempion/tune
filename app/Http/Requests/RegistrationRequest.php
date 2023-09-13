<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'phone' => ['required', 'digits:11', 'unique:users,phone'],
            'password' => ['required', 'confirmed', 'min:5', 'max:30'],
        ];
    }
}
