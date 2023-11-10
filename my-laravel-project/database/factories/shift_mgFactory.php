<?php

namespace Database\Factories;

use Carbon\Carbon;
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
        // $start_time=fake()->time();
        $start_time  = Carbon::parse('20:00:00')->addMinutes(rand(1, 60));
        $end_time    = Carbon::parse('20:00:00')->addMinutes(rand(180, 480));
        return [
            'staff_id'=>function(){
                return \App\Models\employee::inRandomOrder()->first()->staff_id;
            },
            'request_date'=>$this->createdateTimeRequeset(),
            'start_time'=> $start_time,
            'end_time'=>$end_time
            //
        ];
    }
    function createdateTimeRequeset(){
        $da = fake()->dateTimeThisMonth('+12 days');
        // $da = explode(' ',$da);
        return $da->format('Y-m-d');
    }
}
