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
        return [
            'staff_id'=>function () {
                return \App\Models\employee::inRandomOrder()->first()->staff_id;
            },
            'day'=>fake()->date(),
            'message'=>'オーナーか連絡事項です。ご注意ください。',
            
        ];
    }
}
