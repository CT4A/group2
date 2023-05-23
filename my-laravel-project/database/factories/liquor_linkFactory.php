<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\liquor_link>
 */
class liquor_linkFactory extends Factory
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
            'liquor_id'=>function () {
                return \App\Models\liquor_mg::inRandomOrder()->first()->liquor_id;
            },
            'liquor_number'=>$i++,
            'customer_id'=>function(){
                return \App\Models\customer::inRandomOrder()->first()->customer_id;
            }
        ];
    }
}
