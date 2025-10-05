<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $this->call(AtollSeeder::class);
        $this->call(IslandCategorySeeder::class);
        $this->call(IslandSeeder::class);
        $this->call(PlateFormatSeeder::class);
        $this->call(AppSettingSeeder::class);
        $this->call(UserPreferenceSeeder::class);
    }
}
