<?php

namespace Database\Seeders;

use App\Models\Employee;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
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
        $userRole = Role::create(['name' => 'subAdmin']);
        $editCompanyPermission = Permission::create(['name' => 'edit companies']);
        $createCompanyPermission = Permission::create(['name' => 'create companies']);
        $createEmployeePermission = Permission::create(['name' => 'create-employee']);
        $viewCompanyPermission = Permission::create(['name' => 'view companies']);
        $deleteCompanyPermission = Permission::create(['name' => 'delete companies']);
        $adminRole->givePermissionTo([$editCompanyPermission, $createCompanyPermission, $viewCompanyPermission, $deleteCompanyPermission]);
        $userRole->givePermissionTo([$createEmployeePermission]);

        \App\Models\User::factory()->create([
            'name' => 'subAdmin',
            'email' => 'sub-admin@admin.com',
            'password' => Hash::make('password')
        ])->assignRole('subAdmin');

        \App\Models\User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password')
        ])->assignRole('admin');

        $this->call([
            CompanySeeder::class,
            EmployeeSeeder::class,
            ProjectSeeder::class,
            ProjectEmployeeSeeder::class
        ]);
    }
}
