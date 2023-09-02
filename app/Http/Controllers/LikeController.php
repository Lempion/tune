<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LikeController extends Controller
{

    public function index()
    {
        $profilesLikedUsers = auth()->user()->liked;

        return response(view('main.likes', compact('profilesLikedUsers')));
    }

    public function getLikesQuestionnaire(Request $request)
    {

        $cookieProfiles = json_decode('compact_profiles', true);

        return response()->json(['success' => $cookieProfiles]);

    }
}
