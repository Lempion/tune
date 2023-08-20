<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LikeController extends Controller
{

    public function index()
    {
        $profilesLikedUsers = auth()->user()->liked;

        if (!empty($profilesLikedUsers)){
            foreach ($profilesLikedUsers as  $key => $profileLikedUser){
                $profilesLikedUsers[$key] = array_merge($profileLikedUser, json_decode($profileLikedUser['profile_json'], true));
                unset($profilesLikedUsers[$key]['profile_json']);
            }
        }

        dd(json_encode($profilesLikedUsers, JSON_UNESCAPED_UNICODE));

        return response(view('main.likes', compact('profilesLikedUsers')));
    }

    public function getLikesQuestionnaire(Request $request)
    {

        $cookieProfiles = json_decode('compact_profiles', true);

        return response()->json(['success' => $cookieProfiles]);

    }
}
