<?php

declare(strict_types=1);

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Factories\FullUserFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run(): void
    {
//         \App\Models\Interest::factory(15)->create();
//         \App\Models\Music::factory(15)->create();

        for ($i = 0; $i < 50; $i++) {
            FullUserFactory::createFullUser();
        }


        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
