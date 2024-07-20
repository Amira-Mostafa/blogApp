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
        User::factory(10)->create();
        User::factory()->create([
            'username' => 'ordinaryUser ',
            'email' => 'ordinaryUser@gmail',
            'password' => 1111111111,
        ]);
        Tag::factory(10)->create();
    }
}
