<?php

namespace Database\Factories;

use App\Models\Interest;
use App\Models\Music;
use App\Models\PackedProfile;
use App\Models\Profile;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class FullUserFactory extends Factory
{

    public static function createFullUser()
    {
        $profile = Profile::factory()->create();

        $userId = $profile->user->id;

        $packedProfile = new PackedProfile();

        $interests = Interest::select(['icon', 'word'])->inRandomOrder()->limit(fake()->numberBetween(5, 10))->get()->toArray();

        $interestsCurrentArr = array();
        foreach ($interests as $interest) {
            $interestsCurrentArr[$interest['word']] = $interest['icon'];
        }

        $music = Music::select('word')->inRandomOrder()->limit(fake()->numberBetween(2, 10))->get()->pluck('word')->toArray();

        $data = [
            'user_id' => $userId,
            'name' => $profile->name,
            'date_birth' => $profile->date_birth,
            'about' => $profile->about,
            'education' => $profile->education,
            'job' => $profile->job,
            'movies' => $profile->movies,
            'books' => $profile->books,
            'avatars' => ['def1.jpg', 'def2.jpg'],
            'interests' => $interestsCurrentArr,
            'music' => $music,
        ];

        $packedProfile->user_id = $userId;
        $packedProfile->profile_json = json_encode($data, JSON_UNESCAPED_UNICODE);;
        $packedProfile->save();
    }

    public function definition()
    {
        // TODO: Implement definition() method.
    }
}
