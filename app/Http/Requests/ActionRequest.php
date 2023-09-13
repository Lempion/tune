<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ActionRequest extends FormRequest
{

    protected $stopOnFirstFailure = true;

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        if (request()->routeIs('like.action-questionnaire')) {
            $userId = request()->user_id;

            return [
                'action' => ['in:like,dislike'],
                'user_id' => ['required', Rule::exists('likes')->where(function ($q) use ($userId) {
                    return $q->where('user_id', $userId)
                        ->where('selected_user_id', auth()->id())
                        ->where('match', 0);
                })]
            ];
        }

        return [
            'action' => ['in:like,message,dislike'],
            'message' => ['required_if:action,message', 'string', 'nullable', 'max:30'],
        ];
    }

    public function messages(): array
    {
        return [
            'action.in' => 'Unknown error, please refresh the page.',
            'user_id.exists' => 'Like not found.'
        ];
    }
}
