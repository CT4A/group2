<?php

namespace Database\Seeders;

use App\Models\liquor_mg;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class LiquorMgSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\liquor_mg::factory(10)->create();
        //
    }
}
