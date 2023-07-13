<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\liquor_mg;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\liquor_mg>
 */
class liquor_mgFactory extends Factory
{
    protected $model = liquor_mg::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {   
        static $i =1;
        
        return [            
            'liquor_name'=>"whisky".Str::random(4),

            'liquor_type'=>"whiskyの種類".Str::random(4),
            'liquor_number'=>fake()->randomNumber(1),
            //
        ];
    }
}
