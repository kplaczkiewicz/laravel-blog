<?php

namespace Database\Factories;

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
        return [
            "category" => $this->faker->randomElement([
                "laravel",
                "frontend",
                "backend",
                "vue",
            ]),
            "tags" => implode(
                ",",
                $this->faker->randomElements(
                    [
                        "laravel",
                        "frontend",
                        "backend",
                        "vue",
                        "react",
                        "intertia",
                        "api",
                    ],
                    3
                )
            ),
            "image_url" => $this->faker->image(),
            "title" => $this->faker->sentence(),
            "intro_text" => $this->faker->paragraphs(1, true),
            "content" => $this->faker->paragraphs(15, true),
        ];
    }
}
