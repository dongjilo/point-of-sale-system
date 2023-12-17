<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition(): array
    {
        return [
            'product_name' => $this->faker->colorName(),
            'product_price' => $this->faker->randomFloat(2, 0, 1000),
            'product_code' => $this->faker->unique()->numberBetween(1000, 9999),
            'category_id' => $this->faker->numberBetween(1, 10),
        ];
    }
}
