<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            PermissionsSeeder::class,
            AdminSeeder::class,
            DemoUsersSeeder::class,
            CompanySeeder::class,
            AccountSeeder::class,
            MessageSeeder::class,
        ]);
    }
}
