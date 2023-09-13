<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'user_name' => ['required', 'min:2', 'max:25'],
            'user_date_birth' => ['required', 'date', 'date_format:Y-m-d', 'before_or_equal:' . Carbon::now()->subYears(18)->isoFormat('YYYY-MM-DD')],
            'user_about' => ['required', 'string', 'max:500'],
            'user_education' => ['nullable', 'string', 'max:30'],
            'user_job' => ['nullable', 'string', 'max:30'],
            'user_movies' => ['nullable', 'string', 'max:30'],
            'user_books' => ['nullable', 'string', 'max:30'],
            'interests' => ['array'],
            'interests.*' => ['string', 'distinct', 'exists:interests,id'],
            'music' => ['array'],
            'music.*' => ['string', 'distinct', 'exists:music,id'],
            'images' => ['required', 'array', 'min:2', 'max:6'],
            'images.*' => ['required', 'string', 'distinct', 'exists:avatars,image_name'],
            'remove_avatars' => ['array'],
            'remove_avatars.*' => ['string', 'distinct']
        ];
    }

    public function messages(): array
    {
        return [
            'images.required' => 'You need to upload at least 2 image',
        ];
    }
}
