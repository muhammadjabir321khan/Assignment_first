<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 20; $i++) {
            Project::create([
                'name' => fake()->name(),
                'detail' => fake()->sentence(),
                'totalCost' => fake()->numberBetween(100000, 200000),
                'deadline' => fake()->date(),

            ]);
        }
    }
}
