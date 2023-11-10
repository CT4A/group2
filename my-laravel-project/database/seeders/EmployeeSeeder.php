<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Employee::factory()->state([
            'role' => 'admin',
            
        ])->create();
        \App\Models\Employee::factory()->state([
            'tel'=>'000-0000-0000',
            'role' => 'syukkin',
        ])->create();
        
        \App\Models\Employee::factory(10)->create();
        
        //
    }
}
