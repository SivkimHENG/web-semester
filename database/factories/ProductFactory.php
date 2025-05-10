<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

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
        $imagePath = $this->faker->image(
            dir: storage_path('app/public/photos'),
            width: 50,
            height: 50,
            category: 'products',
            fullPath: false
        );
        $imageName = $imagePath ? 'photos/' . $imagePath : null;

        Storage::makeDirectory('public/photos');

        return [
            'product_name' => $this->faker->word(),
            'quantity' => $this->faker->numberBetween(0, 100),
            'price' => $this->faker->randomFloat(2, 0, 1000),
            'image' => 'photos'.$imageName,
            'is_out' => $this->faker->boolean(),
            'description' => implode(' ', $this->faker->sentences(3)),
            'category_id' => Category::inRandomOrder()->exists()
                ? Category::inRandomOrder()->first()->id
                : Category::factory()->create()->id,
            //$this->faker->optional(0.3, null)->randomElement(Category::pluck('id')),
        ];
    }
}
