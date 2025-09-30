<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlateFormatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $formats = [
            // Inhabited islands
            ['name' => 'default', 'format' => 'PSM ####'],
            ['name' => 'format 2027', 'format' => 'PSM #####'],
        ];

        \DB::table('plate_formats')->insert($formats);
    }
}
