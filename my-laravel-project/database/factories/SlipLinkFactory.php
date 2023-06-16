<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\slip_link>
 */
class SlipLinkFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'slip_id'=>function(){
                return \App\Models\slip_mg::inRandomOrder()->first()->slip_id;
            },
            'staff_id'=>function(){
                return \App\Models\employee::inRandomOrder()->first()->staff_id;
            },
        ];
    }
}
