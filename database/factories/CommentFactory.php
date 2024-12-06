<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Post;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $num = fake()->numberBetween(1,60);
        return [
            'body' => fake()->realText(40),
            'post_id' =>  $num,
            'user_id' =>  fake()->numberBetween(1,20),
            'commentable_id' =>  $num,
            'commentable_type' =>  Post::class,
        ];
    }
}
