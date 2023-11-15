<?php

namespace Database\Factories;

use App\Models\attend_leave;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
// use app\Models;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\attend_leave>
 */
class attend_leaveFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $attend_time  = Carbon::parse('20:00:00')->addMinutes(rand(1, 60));
        $leaving_work    = Carbon::parse('20:00:00')->addMinutes(rand(180, 480));
        $staff_id = $this->createStaffId();
        $work_date = $this->createdateTimeRequeset();
        while(attend_leave::where([["staff_id","=",$staff_id],["work_date","=",$work_date]])->exists()){
            $staff_id = $this->createStaffId();
            $work_date = $this->createdateTimeRequeset();
        }
        return [
            'staff_id'=>$staff_id,
            'work_date'=>$work_date,
            'attend_time'=>$attend_time,
            'leaving_work'=>$leaving_work
        ];
    }
    function createdateTimeRequeset(){
        $da = fake()->dateTimeThisMonth();
        return $da->format('Y-m-d');
    }
    function createStaffId(){
        return \App\Models\employee::inRandomOrder()->first()->staff_id;
    }
}
