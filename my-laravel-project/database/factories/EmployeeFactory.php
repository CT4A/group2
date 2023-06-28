<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // 'staff_pass'=>fake()->password(),
            'staff_name'=>fake()->name(),
            'tel'=>fake()->phoneNumber(),
            // 'password'=>bcrypt('password'),
            'hourly_wage'=>1000,
            'residence'=>'名古屋市熱田区',
            'birthday'=>fake()->date(),
            'remarks'=>'なし'
            //
        ];
    }
    
}
