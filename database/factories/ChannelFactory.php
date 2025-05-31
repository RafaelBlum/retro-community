<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Channel>
 */
class ChannelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $title = fake()->unique()->words(2, true);

        return [
            'title' => $title,
            'name' => $this->faker->company(),
            'description' => fake()->paragraphs(3, true),
            'link' => str_replace(' ', '', $this->faker->company()),
            'brand' => 'default-brand.png',
        ];
    }
}
