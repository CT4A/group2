<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\shift_mg>
 */
class shift_mgFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {   
        $start_time=fake()->time();
        $end_time=fake()->time();
        
        while($start_time >= $end_time){
            $start_time=fake()->time();
            $end_time=fake()->time();
        }
        return [
            'staff_id'=>function(){
                return \App\Models\employee::inRandomOrder()->first()->staff_id;
            },
            'request_date'=>fake()->date(),
            'start_time'=>$start_time,
            'end_time'=>$end_time
            //
        ];
    }
}
