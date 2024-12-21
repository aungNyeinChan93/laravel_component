<?php

namespace Database\Factories;

use App\Models\User;
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
            "title"=>fake()->streetName(),
            "description"=>fake()->sentence(),
            "image"=>fake()->imageUrl(),
            "price"=>fake()->randomFloat(2, 1, 100),
            "stock"=>fake()->numberBetween(1, 100),
            "user_id"=>User::factory(),
            "category_id"=>Category::factory()
        ];
    }
}
