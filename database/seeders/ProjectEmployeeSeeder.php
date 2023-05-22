<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Employee;
use App\Models\Project;

class ProjectEmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $employees = Employee::all();
        $projects = Project::all();
        foreach ($projects as $project) {
            foreach ($employees as $employee) {
                $project->employee()->attach($employee->id);
            }
        }
    }
}
