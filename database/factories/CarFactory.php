<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed

     */
    public function definition()
    {
        return [
            'name' => fake()->bothify(),
            'year' => fake()->numberBetween(2000, 2022),
            'model' => fake()->text(10),
            'price' => fake()->randomFloat(2, 100000, 900000),
            'user_id' => fake()->numberBetween(1,5),
            'brand_id' => fake()->numberBetween(1,5)
        ];
    }
}
