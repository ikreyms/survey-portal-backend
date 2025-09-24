<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IslandCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $islandCategories = [
            ['name' => 'tourism', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'inhabited', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'uninhabited', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'industrial', 'created_at' => now(), 'updated_at' => now()],
        ];

        \DB::table('island_categories')->insert($islandCategories);
    }
}
