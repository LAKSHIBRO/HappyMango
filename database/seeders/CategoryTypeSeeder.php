<?php

namespace Database\Seeders;

use App\Models\CategoryType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoryTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CategoryType::factory()->create([
            'name' => 'Tour', // Will be ID 1
        ]);
        CategoryType::factory()->create([
            'name' => 'Post', // Will be ID 2 (for Blog)
        ]);
        CategoryType::factory()->create([
            'name' => 'Gallery', // Will be ID 3
        ]);
        CategoryType::factory()->create([
            'name' => 'Video', // Will be ID 4
        ]);
    }
}
