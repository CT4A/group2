<?php

namespace Database\Factories;

use App\Models\employee;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $customerTypes = ['customer', 'company', 'group'];
        return [
            'customer_name'=>fake()->name(),
            'company_name'=>'なし',
            'customer_type'=>fake()->randomElement($customerTypes),
            'birthday'=>fake()->date(),
            'staff_id'=>function () {
                return \App\Models\Employee::inRandomOrder()->first()->staff_id;
            },
            'remarks'=>'なし'
        ];
    }
    
}
