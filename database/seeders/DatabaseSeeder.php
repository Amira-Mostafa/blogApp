<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Tag;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        Tag::factory()->create([
            'title' => 'social ',
        ]);
        Tag::factory()->create([
            'title' => 'fashion ',
        ]);
        Tag::factory()->create([
            'title' => 'economy',
        ]);
        Tag::factory()->create([
            'title' => 'political',
        ]);
        Tag::factory()->create([
            'title' => 'life',
        ]);
        Tag::factory()->create([
            'title' => 'technology',
        ]);
    }
}
