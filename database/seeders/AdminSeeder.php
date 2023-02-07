<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

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
                'avatar' => asset('assets/img/logo.png'),
                'remember_token' => Str::random(10),
                'address' => 'Riyadh, Saudi Arabia',
            ]
        )->assignRole(Role::create(['name' => 'Super-Admin']));
    }
}
