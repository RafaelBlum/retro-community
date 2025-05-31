<?php

namespace Database\Factories;

use App\Enums\StatusPostEnum;
use App\Models\Category;
use App\Models\User;
use Carbon\Carbon;
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
        $users = User::all()->pluck('id');
        $categories = Category::all()->pluck('id');

        return [
            'title'  => fake()->name(),
            'subTitle' => fake()->title,
            'summary' => fake()->text(50),
            'content' => fake()->text(150),
            'status' => StatusPostEnum::PUBLISHED,
            'featured_image_url' => 'default-post.jpg',
        ];
    }
}
