<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Models\Interest;
use App\Models\Music;
use App\Models\PackedProfile;
use App\Models\Profile;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ProfileController extends Controller
{

    public function index(): View
    {
        $user = Auth::user()->information;

        if ($user['profile']){
            $user['profile']->date_birth = Carbon::parse($user['profile']->date_birth)->age;
        }

        return view('main.profile', compact('user'));
    }

    public function edit(): View
    {
        $user = Auth::user()->information;

        $interests = Interest::all();
        $music = Music::all();

        return view('main.profile_edit', compact('user', 'interests', 'music'));
    }

    public function update(ProfileRequest $request): JsonResponse
    {
        if (!empty($request->remove_avatars)) {
            foreach ($request->images as $image) {
                if (in_array($image, $request->remove_avatars)) {
                    return response()->json(['errors' => ['images' => 'Image processing error']], 422);
                }
            }
            ImageController::deleteAvatars($request->remove_avatars);
        }

        $user = auth()->user();

        $profile = $user->profile ?? new Profile();
        $profile->name = $request->user_name;
        $profile->date_birth = $request->user_date_birth;
        $profile->about = $request->user_about;
        $profile->education = $request->user_education;
        $profile->job = $request->user_job;
        $profile->movies = $request->user_movies;
        $profile->books = $request->user_books;
        $profile->active = 1;
        $user->profile()->save($profile);

        $user->interests()->sync($request->interests);
        $user->music()->sync($request->music);

        ImageController::approveAvatars($request->images, $user);

        $packedProfile = $user->packedProfile ?? new PackedProfile();
        $preparationDataProfile = [
            'user_id' => $user->id,
            'name' => $request->user_name,
            'date_birth' => $request->user_date_birth,
            'about' => $request->user_about,
            'education' => $request->user_education,
            'job' => $request->user_job,
            'movies' => $request->user_movies,
            'books' => $request->user_books,
            'avatars' => $request->images,
            'interests' => $user->interests()->pluck('icon', 'word'),
            'music' => $user->music()->pluck('word'),
        ];
        $packedProfile->profile_json = json_encode($preparationDataProfile, JSON_UNESCAPED_UNICODE);
        $user->packedProfile()->save($packedProfile);

        return response()->json(['success' => 'Profile updated']);
    }

    public function uploadAvatar(Request $request): JsonResponse
    {
        $request->validate([
            'image' => ['required', 'image', 'mimes:png,jpg']
        ]);

        $imageName = ImageController::uploadAvatar($request->image);

        return response()->json(['success' => $imageName]);
    }
}
