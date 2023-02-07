<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::query()->updateOrCreate(
            [
                'name' => 'Nasiha Admin',
                'user_type' => User::ADMIN_USER,
                'email' => 'admin@nasiha.com',
                'email_verified_at' => now(),
                'password' => bcrypt('admin@nasiha.com'),
                'avatar' => 'imgs/logo.png',
                'remember_token' => Str::random(10),
                'address' => 'Riyadh, Saudi Arabia',
            ]
        );
        $user->assignRole('super-admin');
        $user->assignRole(User::ADMIN_USER);
    }
}
