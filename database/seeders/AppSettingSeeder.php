<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AppSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('app_settings')->insert([
            'name' => 'general',
            'value' => json_encode([
                'officeName' => 'MLSA',
                'appName'   => 'Survey Portal',
            ]),
        ]);

        \DB::table('app_settings')->insert([
            'name' => 'plates',
            'value' => json_encode([
                'activeNumberFormatId' => 1,
            ]),
        ]);
    }
}
