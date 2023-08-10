<?php

namespace Database\Factories;

use App\Models\Avatar;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Profile>
 */
class ProfileFactory extends Factory
{

    public function definition()
    {
        $userId = User::factory()->create()->id;

        Avatar::create(['user_id' => $userId, 'image_name' => 'def1.jpg', 'confirmed' => 1]);
        Avatar::create(['user_id' => $userId, 'image_name' => 'def2.jpg', 'confirmed' => 1]);

        return [
            'user_id' => $userId,
            'name' => fake()->name,
            'date_birth' => fake()->date('Y-m-d', '2005-05-05'),
            'about' => fake()->text(500),
            'education' => fake()->text(50),
            'job' => fake()->text(50),
            'movies' => fake()->text(50),
            'books' => fake()->text(50),
            'active' => 1,
            'created_at' => fake()->date() . fake()->time(),
            'updated_at' => fake()->date() . fake()->time(),
        ];
    }
}
