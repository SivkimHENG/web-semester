<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $categories = Category::factory()
            ->count(10)
            ->create();

        Product::factory()->count(50)->create();



        $categories->each(function ($category) {
            Product::factory()
                ->count(20)
                ->create([
                    'category_id' => $category->id,
                ]);
        });

        // User::factory()->create([
        //   'name' => 'Test User',
        // 'email' => 'test@example.com',
        // ]);
    }
}
