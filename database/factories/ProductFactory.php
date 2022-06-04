<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'product_name' => $this->faker->name(),
            'product_price' => $this->faker->numberBetween(99, 999),
            'product_tax' => $this->faker->numberBetween(5, 18),
            'product_model_num' => 'MN_'.$this->faker->numberBetween(111, 2222), // password
        ];
    }
}
