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
            'customer_name'=>fake()->name(),
            'staff_id'=>function(){
                return \App\Models\employee::inRandomOrder()->first()->staff_id;
            },
            'reserve_date'=>fake()->date(),
            'reserve_people'=>fake()->randomNumber(1),
            'table_num'=>fake()->randomNumber(1),
            'remarks'=>'なし'
            //
        ];
    }
}
