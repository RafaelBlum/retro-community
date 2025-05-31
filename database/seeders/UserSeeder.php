<?php

namespace Database\Seeders;

use App\Enums\PanelTypeEnum;
use App\Models\Campaign;
use App\Models\Channel;
use App\Models\Post;
use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $superAdmin = User::updateOrCreate([
            'name' => 'Rafael Blum',
            'email' => 'rafaelblum_digital@hotmail.com',
            'password' => Hash::make('123'),
            'panel' => PanelTypeEnum::SUPER_ADMIN,
            'avatar' => 'default.jpg',
            'remember_token' => Str::random(10),
            'email_verified_at' => now(),
        ]);

        Channel::updateOrCreate([
            'title'  => $superAdmin->name,
            'user_id' => $superAdmin->id,
            'name'  => 'Blumzeira games',
            'link'  => 'blumzeiragames',
            'brand' => 'default-brand.png',
        ]);

        User::factory(5)->create()->each(function ($user){
            $channel = Channel::factory()->create([
                'user_id' => $user->id,
            ]);

            Campaign::factory()->create([
                'channel_id' => $channel->id,
            ]);
        });
    }
}
