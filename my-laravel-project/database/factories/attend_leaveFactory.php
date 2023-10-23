<?php

namespace Database\Factories;

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
        $attend_time = fake()->time();
        $leaving_work = fake()->time();
        while($attend_time >= $leaving_work){
            $attend_time=fake()->time();
            $leaving_work=fake()->time();
        }
        return [
            'staff_id'=>function () {
                return \App\Models\employee::inRandomOrder()->first()->staff_id;
            },
            'work_date'=>fake()->date(),
            'attend_time'=>$attend_time,
            'leaving_work'=>$leaving_work
        ];
    }
}
