<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Tag;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create a user
        $user = User::factory()->create([
            'name' => 'Kacper Placzkiewicz',
            'email' => 'kacper@email.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            'remember_token' => Str::random(10),
        ]);

        // Populate categories
        Category::factory()->create(["name" => "laravel"]);
        Category::factory()->create(["name" => "frontend"]);
        Category::factory()->create(["name" => "backend"]);
        Category::factory()->create(["name" => "api"]);

        // Populate tags
        Tag::factory()->create(["name" => "laravel"]);
        Tag::factory()->create(["name" => "frontend"]);
        Tag::factory()->create(["name" => "backend"]);
        Tag::factory()->create(["name" => "api"]);
        Tag::factory()->create(["name" => "vue"]);
        Tag::factory()->create(["name" => "react"]);

        // Populate posts
        Post::factory(20)->create([
            'user_id' => $user->id
        ]);

        // Get all the roles attaching up to 3 random roles to each user
        $tags = Tag::all();

        // Populate the pivot table
        Post::all()->each(function ($post) use ($tags) { 
            $post->tags()->attach(
                $tags->random(3)->pluck('id')->toArray()
            ); 
        });
    }
}
