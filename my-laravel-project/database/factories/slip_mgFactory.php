<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\slip_mg>
 */
class slip_mgFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'customer_id'=>function(){
                return \App\Models\customer::inRandomOrder()->first()->customer_id;
            },
            'responsibility'=>function(){
                return \App\Models\employee::inRandomOrder()->first()->staff_id;
            },
            'ap_day'=>$this->createdateTimeRequeset(),
            'total'=>random_int(1, 100)*10000
        ];
    }
    function createdateTimeRequeset(){
        $da = fake()->unique()->dateTimeThisMonth('+12 days');
        return $da->format('Y-m-d');
    }
}
