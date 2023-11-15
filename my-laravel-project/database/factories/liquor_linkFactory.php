<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\liquor_link;
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
        
        $liquor_id = $this->getLiquorId();
        $liquor_number = $this->getLiquorNumber($liquor_id);
        $customer_id = $this->getCusmoerId();
        
        $checkPrimary = liquor_link::where([
            ["customer_id",$customer_id],
            ["liquor_id",$liquor_id],
            ["liquor_number",$liquor_number]
        ])->exists();

        while($checkPrimary){
            $liquor_id = $this->getLiquorId();
            $liquor_number = $this->getLiquorNumber($liquor_id);
            $customer_id = $this->getCusmoerId();
            $checkPrimary = liquor_link::where([
                ["customer_id",$customer_id],
                ["liquor_id",$liquor_id],
                ["liquor_number",$liquor_number],
            ])->exists();
        }
        return [
            'liquor_id'=>$liquor_id,
            'liquor_number'=>$this->getLiquorNumber($liquor_id),
            'customer_id'=>$this->getCusmoerId(),
            'group_name'=>'なし',
            'liquor_day'=>$this->createdateTimeRequeset()
        ];
    }

    function getCusmoerId(){
        return \App\Models\customer::inRandomOrder()->first()->customer_id;
    }
    function getLiquorId(){
        return \App\Models\liquor_mg::inRandomOrder()->first()->liquor_id;
    }
    function getLiquorNumber($id){
        return \App\Models\liquor_mg::where("liquor_id",$id)->first()->liquor_number+1;
    }
    function createdateTimeRequeset(){
        $da = fake()->dateTimeThisMonth('+12 days');
        return $da->format('Y-m-d');
    }
}
