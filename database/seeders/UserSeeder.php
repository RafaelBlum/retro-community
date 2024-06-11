<?php

namespace Database\Seeders;

use App\Enums\PanelTypeEnum;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
            'name'     => 'Rafael Blum',
            'email'    => 'rafaelblum_digital@hotmail.com',
            'password' => Hash::make('123'),
            'panel'   => PanelTypeEnum::ADMIN,
            'avatar' => 'default.jpg',
        ]);

        User::updateOrCreate([
            'name'     => 'Usuário Teste',
            'email'    => 'teste@hotmail.com',
            'password' => Hash::make('teste'),
            'panel'   => PanelTypeEnum::APP,
            'avatar' => 'default.jpg',
        ]);
    }
}
