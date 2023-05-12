<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory {
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array {
        $post = Post::inRandomOrder()->first();

        return [
            "post_id" => $post->id,
            "author" => $this->faker->userName(),
            "content" => $this->faker->paragraph(5, true),
            "approved" => true
        ];
    }
}
