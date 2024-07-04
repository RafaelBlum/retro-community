<?php

namespace Database\Seeders;

use App\Enums\PanelTypeEnum;
use App\Models\Channel;
use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate([
            'name' => 'Rafael Blum',
            'email' => 'rafaelblum_digital@hotmail.com',
            'password' => Hash::make('123'),
            'panel' => PanelTypeEnum::SUPER_ADMIN,
            'avatar' => 'default.jpg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $users = User::find(1);

        Channel::updateOrCreate([
            'title'  => $users->name,
            'user_id' => $users->id,
            'name'  => 'Meu canal',
            'link'  => fake()->url(),
            'brand' => 'default-brand.png',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        User::updateOrCreate([
            'name' => 'Usuário Admin',
            'email' => 'admin-retro-community@hotmail.com',
            'password' => Hash::make('teste'),
            'panel' => PanelTypeEnum::ADMIN,
            'avatar' => 'default.jpg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $users = User::find(2);

        Channel::updateOrCreate([
            'title'  => $users->name,
            'user_id' => $users->id,
            'name'  => 'Meu canal',
            'link'  => fake()->url(),
            'brand' => 'default-brand.png',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        User::updateOrCreate([
            'name' => 'Usuário App',
            'email' => 'user-retro-community@hotmail.com',
            'password' => Hash::make('teste'),
            'panel' => PanelTypeEnum::APP,
            'avatar' => 'default.jpg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $users = User::find(3);

        Channel::updateOrCreate([
            'title'  => $users->name,
            'user_id' => $users->id,
            'name'  => 'Meu canal',
            'link'  => fake()->url(),
            'brand' => 'default-brand.png',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
