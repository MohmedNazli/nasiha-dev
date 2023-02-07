<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DemoUsersSeeder extends Seeder
{
    public function run(): void
    {
        User::query()->updateOrCreate(
            [
                'name' => 'Nasiha Staff',
                'user_type' => User::COMPANY_USER,
                'email' => 'company@nasiha.com',
                'email_verified_at' => now(),
                'password' => bcrypt('company@nasiha.com'),
                'avatar' => 'imgs/logo.png',
                'remember_token' => Str::random(10),
                'address' => 'Riyadh, Saudi Arabia',
            ]
        )->assignRole(User::COMPANY_USER);

        User::query()->updateOrCreate(
            [
                'name' => 'Nasiha',
                'user_type' => 'user',
                'email' => 'user@nasiha.com',
                'email_verified_at' => now(),
                'password' => bcrypt('user@nasiha.com'),
                'avatar' => 'imgs/logo.png',
                'remember_token' => Str::random(10),
                'address' => 'Riyadh, Saudi Arabia',
            ]
        )->assignRole(User::EMPLOYEE_USER);
    }
}
