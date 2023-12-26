<?php

namespace Database\Factories;

use App\Models\shift_mg;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\shift_mg>
 */
class shift_mgFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {   
        // $start_time=fake()->time();
        $start_time  = Carbon::parse('20:00:00')->addMinutes(rand(1, 60));
        $end_time    = Carbon::parse('20:00:00')->addMinutes(rand(180, 480));
        
        $staff_id = $this->createStaffId();
        $request_date = $this->createdateTimeRequeset();
        
        $checkPrimary = shift_mg::where([
            ["staff_id",$staff_id],
            ["request_date",$request_date]
        ])->exists();

        while($checkPrimary){
            $staff_id = $this->createStaffId();
            $request_date = $this->createdateTimeRequeset();
            
            $checkPrimary = shift_mg::where([
                ["staff_id",$staff_id],
                ["request_date",$request_date]
            ])->exists();
    }
        return [
            'staff_id'=>$staff_id,
            'request_date'=>$request_date,
            'start_time'=> $start_time,
            'end_time'=>$end_time
            //
        ];
    }
    function createdateTimeRequeset(){
        $da = fake()->dateTimeThisMonth('+12 days');
        // $da = explode(' ',$da);
        return $da->format('Y-m-d');
    }
    function createStaffId(){
        return \App\Models\employee::inRandomOrder()->first()->staff_id;
    }
}
