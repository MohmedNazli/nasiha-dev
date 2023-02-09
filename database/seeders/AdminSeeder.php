<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        Admin::query()->updateOrCreate(
            [
                'name' => 'Nasiha Admin',
                'email' => 'admin@nasiha.com',
                'password' => Hash::make('admin@nasiha.com'),
                'image' => 'images/logo.png',
                'isActive' => true,
            ]
        );
    }
}
