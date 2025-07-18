<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Status::factory()->create([
            'id' => 0,
            'name' => 'Inactive',
        ]);

        Status::factory()->create([
            'id' => 1,
            'name' => 'Active',
        ]);
    }
}
