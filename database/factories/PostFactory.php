<?php

namespace Database\Factories;

use App\Models\User;
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
        $title =  fake()->sentence(2);
        return [
            'user_id' => fake()->randomElement([1, 2]),
            'title' => rtrim($title, '.'),
            'content' => fake()->paragraph(2),
        ];
    }
}
