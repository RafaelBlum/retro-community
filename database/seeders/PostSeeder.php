<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Post::factory(10)->make()->each(function ($post) {
            $post->user_id = User::inRandomOrder()->first()->id;
            $post->category_id = Category::inRandomOrder()->first()->id;

            $post->save();
        });
    }
}
