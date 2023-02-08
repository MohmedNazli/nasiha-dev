<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::query()->updateOrCreate(
            [
                'name' => 'Nasiha Admin',
                'user_type' => User::ADMIN_USER,
                'email' => 'admin@nasiha.com',
                'email_verified_at' => now(),
                'password' => bcrypt('admin@nasiha.com'),
                'avatar' => 'images/logo.png',
                'remember_token' => Str::random(10),
                'address' => 'Riyadh, Saudi Arabia',
            ]
        );

        Admin::factory()
            ->create();
    }
}
