<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class LikeController extends Controller
{

    public function index()
    {
        $profilesLikedUsers = auth()->user()->liked;

        return response(view('main.likes', compact('profilesLikedUsers')));
    }

    public function actionQuestionnaire(Request $request): JsonResponse
    {
        $request->validate([
            'action' => ['in:like,dislike'],
            'user_id' => ['required', Rule::exists('likes')->where(function ($q) use ($request) {
                return $q->where('user_id', $request->user_id)
                    ->where('selected_user_id', auth()->id())
                    ->where('match', 0);
            })]

        ], [
            'action.in' => 'Unknown error, please refresh the page.',
            'user_id.exists' => 'Like not found.'
        ]);

        switch ($request->action) {
            case 'like':
                ActionController::activeLike($request->user_id);
                break;
            case 'dislike':
                ActionController::activeDislike($request->user_id);
                break;
        }

        return response()->json();
    }
}
