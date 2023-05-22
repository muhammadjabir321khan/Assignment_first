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
        $usedEmployees = collect();
        foreach ($employees as $employee) {
            $randomProjects = $projects->except($usedEmployees->pluck('id')->toArray())->random(2);
            foreach ($randomProjects as $project) {
                $project->employee()->attach($employee->id);
                $usedEmployees->push($employee->id);
            }
        }
    }
}
