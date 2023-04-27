<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $adminRole = Role::create(['name' => 'admin']);
        $userRole = Role::create(['name' => 'user',]);
        $editCompanyPermission = Permission::create(['name' => 'edit company']);
        $createCompanyPermission = Permission::create(['name' => 'create company']);
        $viewCompanyPermission = Permission::create(['name' => 'view company']);
        $deleteCompanyPermission = Permission::create(['name' => 'delete company']);
        $adminRole->givePermissionTo([$editCompanyPermission, $createCompanyPermission, $viewCompanyPermission, $deleteCompanyPermission]);
        $userRole->givePermissionTo([$createCompanyPermission]);
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'user',
            'email' => 'sub-admin@admin.com',
            'password' => Hash::make('password')
        ]);

        \App\Models\User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password')
        ]);
    }
}
