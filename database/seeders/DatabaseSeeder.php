<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $tes = User::factory()->create([
            'name' => 'Vinsensius',
            'email' => 'deliverindihom@gmail.com',
            'password' => bcrypt('password'),
            'username' => 'vinsensius',
            //'profile_photo_path' => 'profile-photos/vinsensius.jpg',
            'gender' => 'male',
            'phone' => '085741234567',
            'is_admin' => true
        ]);

        Post::factory(50)->recycle([
            Category::factory(3)->create(),
            $tes,
            User::factory(10)->create()
            ])->create();

    }
}
