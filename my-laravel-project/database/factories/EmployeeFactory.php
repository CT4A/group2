<?php

namespace Database\Factories;
use Faker\Generator as Faker;
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
    // $factory->define(App\Models\Employee::class, function (Faker $faker) {
    //     $faker->addProvider(new Faker\Provider\ja_JP\Person($faker));
    //     return [
    //         'first_name' => $faker->firstName,
    //         'last_name' => $faker->lastName,
    //         'email' => $faker->unique()->safeEmail,
    //         'phone' => $faker->phoneNumber,
    //         // Thêm các cột khác tùy ý
    //     ];
    // });
    public function definition(): array
    {
        return [
            'staff_name'=>fake()->name(),
            'tel'=>fake()->phoneNumber(),
            'hourly_wage'=>1000,
            'residence'=>$this->createAddress(),
            'birthday'=>fake()->date(),
            'remarks'=>'なし'
            //
        ];
    }
    public function createAddress(){
        $add = fake()->address();
        $add= explode("  ",$add);
        return $add[1];
    }
}
