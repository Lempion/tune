<?php

declare(strict_types=1);

namespace App\Http\Controllers;

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

    public function update(Request $request): JsonResponse
    {
        $request->validate([
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
        ], [
            'images.required' => 'You need to upload at least 2 image',
        ]);

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
