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
       
        $liquorNames = ["―ウイスキー", "ラム", "テキーラ", "ジン"];
        $liquorNumber = $this->faker->numberBetween(1, 100);
        $liquorName = $this->faker->randomElement($liquorNames);
        $liquorType = $liquorName . $liquorNumber;
        
        $checkPrimary = liquor_mg::where([
            ["liquor_type",$liquorType],
            ["liquor_name",$liquorName]
        ])->exists();
        while($checkPrimary){
            $liquorNumber = $this->faker->numberBetween(1, 100);
            $liquorName = $this->faker->randomElement($liquorNames);
            $liquorType = $liquorName . $liquorNumber;

            $checkPrimary = liquor_mg::where([
                ["liquor_type",$liquorType],
                ["liquor_name",$liquorName]
            ])->exists();
        }
        
        return [
            'liquor_type' => $liquorType,
            'liquor_name' => $liquorName
        ];
    }
}