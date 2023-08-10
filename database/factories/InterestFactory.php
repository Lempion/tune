<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Interest>
 */
class InterestFactory extends Factory
{

    public function definition()
    {
        return [
            'slug' => fake()->slug,
            'icon' => fake()->emoji,
            'word' => fake()->word,
        ];
    }
}
