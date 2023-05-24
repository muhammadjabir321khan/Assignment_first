<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $imagePath = public_path('images');
        $files = File::files($imagePath);
        foreach ($files as $index => $file) {
            $fileContent = file_get_contents($file);
            $filename = time() . '_' . ($index + 1) . '.png';
            try {
                Storage::disk('public')->put('images/' . $filename, $fileContent);
                Company::create([
                    'name' => fake()->name(),
                    'email' => fake()->email(),
                    'logo' =>  $filename,
                ]);
            } catch (\Exception $e) {
                // Log or print the exception to debug
                dd($e->getMessage());
            }
        }
    }
}
