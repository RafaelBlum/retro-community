<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Campaign>
 */
class CampaignFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->name(),
            'content' => fake()->text(50),
            'goal_link' => $this->faker->url(),
            'qr_code' => $this->faker->url(),
            'pix_page_link' => $this->faker->url(),
            'is_active' => false,
            'image' => 'default-campaign.jpg'
        ];
    }
}
