<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\Request;

class ActionController extends Controller
{
    public static function activeLike($selectedUserId, $message = ''): bool
    {
        $matchUser = Like::where('user_id', $selectedUserId)->where('selected_user_id', auth()->user()->id)->first();

        if (isset($matchUser)) {
            $matchUser->match = 1;
            $matchUser->save();
        }

        auth()->user()
            ->likes()
            ->create(['selected_user_id' => $selectedUserId, 'message' => $message, 'match' => isset($matchUser)])
            ->save();

        return (isset($matchUser));
    }

    public static function activeDislike($selectedUserId): void
    {
        Like::where('user_id', $selectedUserId)->where('selected_user_id', auth()->id())->delete();
    }
}
