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
            'day'=>fake()->date(),
            'message'=>'オーナーか連絡事項です。ご注意ください。'
        ];
    }
}
