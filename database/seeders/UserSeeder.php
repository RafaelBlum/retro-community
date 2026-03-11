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
        $superAdmin = User::updateOrCreate(
            ['email' => 'rafaelblum_digital@hotmail.com'],
            [
                'name' => 'Rafael Blum',
                'password' => Hash::make('123'),
                'panel' => PanelTypeEnum::SUPER_ADMIN,
                'avatar' => 'default.jpg',
                'remember_token' => Str::random(10),
                'email_verified_at' => now(),
            ]
        );

        Channel::updateOrCreate(
            ['user_id' => $superAdmin->id],
            [
                'title'  => 'Canal do Rafael',
                'name'   => 'Blumzeira games',
                'link'   => 'blumzeiragames',
                'brand'  => 'default-brand.png',
                'color'  => '#7c3aed',
            ]
        );

        $otherUsers = User::factory(10)->create()->each(function ($user) {

            $channel = Channel::factory()->create([
                'user_id' => $user->id,
            ]);

            Campaign::factory()->create([
                'channel_id' => $channel->id,
            ]);
        });

        $allChannels = Channel::all();

        User::all()->each(function ($user) use ($allChannels) {
            $user->following()->attach(
                $allChannels->random(rand(1, 5))->pluck('id')
            );
        });
    }
}
