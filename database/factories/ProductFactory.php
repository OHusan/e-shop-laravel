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
            'title' => fake()->title(),
            'slug' => fake()->slug(),
            'quantity' => rand(1, 100),
            'description' => fake()->text('50'),
            'published' => true,
            'inStock' => true,
            'price' => rand(1, 2000),
            'created_by' => null,
            'updated_by' => null,
            'brand_id' => rand(1, 3),
            'category_id' => rand(1, 3),
            'deleted_by' => null,
        ];
    }
}
