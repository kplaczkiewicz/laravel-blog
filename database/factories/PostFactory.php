<?php

namespace Database\Factories;

use App\Models\Tag;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory {
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array {
        // Get random category
        $category = Category::inRandomOrder()->first();

        return [
            'category_id' => $category->id,
            "title" => $this->faker->sentence(),
            "intro_text" => $this->faker->paragraphs(1, true),
            "content" => $this->faker->paragraphs(15, true),
        ];
    }
}
