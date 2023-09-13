<?php

namespace App\Http\Controllers;

use App\Http\Requests\ActionRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class LikeController extends Controller
{

    public function index(): Response
    {
        $profilesLikedUsers = auth()->user()->liked;

        return response(view('main.likes', compact('profilesLikedUsers')));
    }

    public function actionQuestionnaire(ActionRequest $request): JsonResponse
    {
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
