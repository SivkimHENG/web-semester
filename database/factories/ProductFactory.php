<?php

namespace Database\Factories;

use App\Models\Category;
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
            'product_name' => $this->faker->word(),
            'quantity' => $this->faker->numberBetween(0, 100000),
            'price' => $this->faker->randomFloat(2, 0, 10000),
            'is_out' => $this->faker->boolean(),
            'description' => implode(' ', $this->faker->sentences(3)),
            'category_id' => Category::factory(),

        ];
    }
}
