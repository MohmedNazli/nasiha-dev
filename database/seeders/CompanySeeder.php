<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CompanySeeder extends Seeder
{
    public function run(): void
    {
        Company::query()->create(
            [
                'name' => 'Nasiha Company',
                'user_name' => 'nasiha_company',
                'email' => 'company@nasiha.com',
                'password' => Hash::make('company@nasiha.com'),
                'image' => 'images/logo.png',
                'isActive' => true,
                'settings' => '["color","red"]',
            ]
        );
    }
}
