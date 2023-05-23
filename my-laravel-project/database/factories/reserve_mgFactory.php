<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\reserve_mg>
 */
class reserve_mgFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        static $i=1;
        return [
            'reserve_id'=>$i++,
            'customer'=>fake()->name(),
            'staff_id'=>function(){
                return \App\Models\employee::inRandomOrder()->first()->staff_id;
            },
            'reserve_date'=>fake()->date()
            //
        ];
    }
}
