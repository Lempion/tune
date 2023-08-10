<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Music>
 */
class MusicFactory extends Factory
{

    public function definition()
    {
        return [
            'slug' => fake()->slug,
            'word' => fake()->word,
        ];
    }
}
