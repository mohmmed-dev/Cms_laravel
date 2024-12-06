<?php

namespace Database\Factories;

use App\Helpers\Slug;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->text(40);
        return [
            'title' => $title,
            'slug' =>  Slug::createSlug($title),
            'body' => '<p>' . fake()->realText(150) . '</p>',
            'user_id' => fake()->numberBetween(1,20),
            'approved' => 1,
            'category_id' => fake()->numberBetween(1,30),
        ];
    }
}
