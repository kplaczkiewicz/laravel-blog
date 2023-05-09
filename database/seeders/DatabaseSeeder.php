<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Tag;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(5)->create();

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
        Post::factory(20)->create();

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
