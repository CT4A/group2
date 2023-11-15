<?php

namespace Database\Factories;

use App\Models\slip_link;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\slip_link>
 */
class slip_linkFactory extends Factory
{

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition(): array
    {
        $slip_id = $this->createSlip();
        $staff_id = $this->createStaffId();
        
        $checkPrimary = slip_link::where([
            ["slip_id",$slip_id],
            ["staff_id",$staff_id]
        ])->exists();

        while($checkPrimary){
            $slip_id = $this->createSlip();
            $staff_id = $this->createStaffId();

            $checkPrimary = slip_link::where([
                ["slip_id",$slip_id],
                ["staff_id",$staff_id]
            ])->exists();
        }
        return [
            'slip_id'=>$slip_id,
            'staff_id'=>$staff_id,
        ];
    }

    function createSlip(){
        return \App\Models\slip_mg::inRandomOrder()->first()->slip_id;
    }
    
    function createStaffId(){
        return \App\Models\employee::inRandomOrder()->first()->staff_id;
    }

}
