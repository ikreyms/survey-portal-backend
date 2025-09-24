<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AtollSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $atolls = [
            ['name' => 'Haa Alif Atoll', 'abbreviation' => 'HA', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Haa Dhaalu Atoll', 'abbreviation' => 'HDh', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Shaviyani Atoll', 'abbreviation' => 'Sh', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Noonu Atoll', 'abbreviation' => 'N', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Raa Atoll', 'abbreviation' => 'R', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Baa Atoll', 'abbreviation' => 'B', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Lhaviyani Atoll', 'abbreviation' => 'Lh', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Kaafu Atoll', 'abbreviation' => 'K', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Alifu Alifu Atoll', 'abbreviation' => 'AA', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Alifu Dhaalu Atoll', 'abbreviation' => 'ADh', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Vaavu Atoll', 'abbreviation' => 'V', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Meemu Atoll', 'abbreviation' => 'M', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Faafu Atoll', 'abbreviation' => 'F', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Dhaalu Atoll', 'abbreviation' => 'Dh', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Thaa Atoll', 'abbreviation' => 'Th', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Laamu Atoll', 'abbreviation' => 'L', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Gaafu Alifu Atoll', 'abbreviation' => 'GA', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Gaafu Dhaalu Atoll', 'abbreviation' => 'GDh', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Gnaviyani Atoll', 'abbreviation' => 'Gn', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Seenu Atoll', 'abbreviation' => 'S', 'created_at' => now(), 'updated_at' => now()],
        ];

        \DB::table('atolls')->insert($atolls);
    }
}
