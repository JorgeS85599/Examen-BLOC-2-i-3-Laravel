<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class GangaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $price= $this->faker->randomFloat(2,1,2000);
        return [
            'title'=>$this->faker->title(),
            'description'=>$this->faker->text(100),
            'url'=>$this->faker->url(),
            'id_category'=>$this->faker->numberBetween(1,3),
            'points'=>$this->faker->numberBetween(1,10),
            'price'=>$price,
            'discount_price'=>$this->faker->numberBetween(1,$price),
            'available'=>$this->faker->boolean(),
        ];
    }
}
