<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IslandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $islands = [
            // Inhabited islands
            ['f_code' => 'LD0001', 'name' => 'Dhidhdhoo', 'atoll_id' => 1, 'category_id' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['f_code' => 'LD0002', 'name' => 'Male\' City', 'atoll_id' => 8, 'category_id' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['f_code' => 'LD0003', 'name' => 'Thinadhoo', 'atoll_id' => 18, 'category_id' => 2, 'created_at' => now(), 'updated_at' => now()],

            // Tourism islands (resorts)
            ['f_code' => 'LD0004', 'name' => 'Sun Island', 'atoll_id' => 9, 'category_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['f_code' => 'LD0005', 'name' => 'Kudarikilu Resort', 'atoll_id' => 6, 'category_id' => 1, 'created_at' => now(), 'updated_at' => now()],

            // Uninhabited islands
            ['f_code' => 'LD0006', 'name' => 'Vavathi', 'atoll_id' => 4, 'category_id' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['f_code' => 'LD0007', 'name' => 'Olhuveli', 'atoll_id' => 16, 'category_id' => 3, 'created_at' => now(), 'updated_at' => now()],

            // Industrial islands
            ['f_code' => 'LD0008', 'name' => 'Thilafushi', 'atoll_id' => 8, 'category_id' => 4, 'created_at' => now(), 'updated_at' => now()],
            ['f_code' => 'LD0009', 'name' => 'Hulhudhoo Industrial Zone', 'atoll_id' => 20, 'category_id' => 4, 'created_at' => now(), 'updated_at' => now()],
        ];

        \DB::table('islands')->insert($islands);
    }
}
