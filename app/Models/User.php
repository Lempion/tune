<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'phone_verified_at' => 'datetime',
    ];

    public function profile(): HasOne
    {
        return $this->hasOne(Profile::class);
    }

    public function packedProfile(): HasOne
    {
        return $this->hasOne(PackedProfile::class);
    }

    public function interests(): BelongsToMany
    {
        return $this->belongsToMany(Interest::class);
    }

    public function music(): BelongsToMany
    {
        return $this->belongsToMany(Music::class);
    }

    public function avatars(): HasMany
    {
        return $this->hasMany(Avatar::class);
    }

    public function likes(): HasMany
    {
        return $this->hasMany(Like::class);
    }

    public function getLikedAttribute(): array
    {
        $profilesLikedUsers = Like::join('packed_profiles', 'likes.user_id', '=', 'packed_profiles.user_id')
            ->select(['likes.user_id', 'likes.message', 'packed_profiles.profile_json'])
            ->where('selected_user_id', auth()->id())
            ->where('match', 0)
            ->get()
            ->toArray();

        if (!empty($profilesLikedUsers)) {
            foreach ($profilesLikedUsers as $key => $profileLikedUser) {
                $profilesLikedUsers[$key] = array_merge($profileLikedUser, json_decode($profileLikedUser['profile_json'], true));
                $profilesLikedUsers[$key]['date_birth'] = Carbon::parse($profilesLikedUsers[$key]['date_birth'])->age;
                unset($profilesLikedUsers[$key]['profile_json']);
            }
        }

        return $profilesLikedUsers;
    }

    public function processedQuestionnaires(): HasMany
    {
        return $this->hasMany(ProcessedProfile::class);
    }

    public function getApprovedAvatarsAttribute(): Collection
    {
        return $this->avatars()->where('confirmed', 1)->get();
    }

    public function getInformationAttribute(): array
    {
        $profile = $this->profile;
        $avatars = $this->approvedAvatars;
        $interests = $this->interests;
        $music = $this->music;

        return compact('profile', 'avatars', 'music', 'interests');
    }

    public function questionnaires()
    {
        return $this->hasMany(Questionnaire::class);
    }

    public function getLastQuestionnaireAttribute()
    {

    }

    public function hasVerifiedPhone(): bool
    {
        return !is_null($this->phone_verified_at);
    }
}
