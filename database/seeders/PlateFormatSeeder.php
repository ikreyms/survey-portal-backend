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
            ['name' => 'default'],
        ];

        $ranges = [
            ['name' => 'local', 'plate_format_id' => 1, 'start' => 1000, 'end' => 4999],
            ['name' => 'tourism', 'plate_format_id' => 1, 'start' => 5000, 'end' => 9999],
        ];

        $available = [
            ['start' => 1000, 'end' => 4999, 'plate_format_range_id' => 1],
            ['start' => 5000, 'end' => 9999, 'plate_format_range_id' => 2]
        ];

        \DB::table('plate_formats')->insert($formats);
        \DB::table('plate_format_ranges')->insert($ranges);
        \DB::table('available_ranges')->insert($available);
    }
}
