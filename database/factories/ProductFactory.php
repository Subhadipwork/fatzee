<?php

namespace Database\Factories;
use App\Models\Product;
use App\Models\ProductImage;

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
        $categoryid = \App\Models\Category::all()->random()->id;
        return [
            'category_id' => $categoryid,
            'product_name' => $this->faker->name,
            'product_code' => $this->faker->ean8,
            'price' => $this->faker->numberBetween(100, 1000),
            'description' => $this->faker->text
        ];
    }
   
    
}
