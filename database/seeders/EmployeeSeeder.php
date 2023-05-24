<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Employee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $company = Company::all();
        foreach ($company as $data) {
            for ($i = 0; $i < 10; $i++) {
                Employee::create([
                    'fname' => fake()->name(),
                    'lname' => fake()->name(),
                    'company_id' => $data->id,
                ]);
            }
        }
    }
}
