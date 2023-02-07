<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionsSeeder extends Seeder
{
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();
        Permission::create(['name' => 'companies section']);
        Role::create(['name' => 'super-admin']);
        Role::create(['name' => User::ADMIN_USER])->givePermissionTo('companies section');
        Role::create(['name' => User::COMPANY_USER]);
        Role::create(['name' => User::EMPLOYEE_USER]);
    }
}
