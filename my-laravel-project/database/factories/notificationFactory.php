<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\shift_mg>
 */
class notificationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {        
        $staff_id = $this->getStaff()->staff_id;
        $staff_name = $this->getStaff()->staff_name;
        return [
            'staff_id'=>$staff_id,
            'day'=>fake()->dateTimeThisMonth('+12 days'),
            'message'=>$staff_name.'さんからのテストメッセージです。',
        ];
    }
    function getStaff() {
        $staff = \App\Models\employee::inRandomOrder()->select('staff_id','staff_name')->first();
        return $staff;
    }
}
