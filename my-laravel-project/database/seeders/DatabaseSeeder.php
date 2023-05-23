<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        \App\Models\employee::factory(10)->create();
        \App\Models\attend_leave::factory(10)->create();
        \App\Models\customer::factory(10)->create();
        \App\Models\liquor_mg::factory(10)->create();
        \App\Models\liquor_link::factory(10)->create();
        
        \App\Models\reserve_mg::factory(10)->create();
        \App\Models\shift_mg::factory(10)->create();
        \App\Models\slip_mg::factory(10)->create();
    }
}
