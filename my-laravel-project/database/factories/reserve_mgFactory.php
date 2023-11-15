<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

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
        return [
            'customer_name'=>fake()->name(),
            'staff_id'=>function(){
                return \App\Models\employee::inRandomOrder()->first()->staff_id;
            },
            'reserve_date'=>$this->createdateTimeRequeset(),
            'reserve_people'=>fake()->randomNumber(1),
            'reserve_time'=>Carbon::parse('20:00:00')->addMinutes(rand(1, 120)),
            'remarks'=>'なし'
            //
        ];
    }
    function createdateTimeRequeset(){
        $da = fake()->dateTimeThisMonth('+12 days');
        // $da = explode(' ',$da);
        return $da->format('Y-m-d');
    }
}
