<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
 
        $this->call([
            EmployeeSeeder::class,
            AttendLeaveSeeder::class,
            CustomerSeeder::class,
            LiquorMgSeeder::class,
            LiquorLinkSeeder::class,
            ReserveMgSeeder::class,
            ShiftMgSeeder::class,
            SlipMgSeeder::class
            ]);
    }
}
