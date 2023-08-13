<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Avatar;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{

    public static function uploadAvatar($imageFile): string
    {
        $imageName = uniqid() . '.' . $imageFile->extension();

        Storage::putFileAs('public/avatars', $imageFile, $imageName);

        Avatar::create(['user_id' => auth()->user()->id, 'image_name' => $imageName, 'confirmed' => 0]);

        return $imageName;
    }

    public static function approveAvatars(array $avatarImagesNames, $user): void
    {
        foreach ($avatarImagesNames as $imageName) {
            if ($user->avatars->contains('image_name', $imageName)) {
                Avatar::where('image_name', $imageName)->update(['confirmed' => '1']);
            }
        }

        self::clearAvatarTable($user);
    }

    public static function clearAvatarTable($user = null): void
    {
        if ($user !== null) {
            $user->avatars()->where('confirmed', 0)->delete();
            return;
        }

        Avatar::where('confirmed', 0)->whereDate('created_at', '<', Carbon::now()->subHour()->isoFormat('YYYY-MM-DD H:m:s'))->delete();
    }

    public static function deleteAvatars($avatars): void
    {
        auth()->user()->avatars()->whereIn('image_name', $avatars)->delete();
    }
}
