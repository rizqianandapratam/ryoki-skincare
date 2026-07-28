<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    protected $model = Product::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        $categories = ['Cleanser', 'Serum', 'Moisturizer', 'Sunscreen', 'Toner', 'Acne Care'];
        $name = 'Ryoki ' . fake()->unique()->words(3, true);

        return [
            'name'           => ucwords($name),
            'slug'           => Str::slug($name),
            'description'    => fake()->paragraph(2),
            'usage'          => fake()->sentence(12),
            'ingredients'    => 'Aqua, Glycerin, Niacinamide, ' . fake()->words(4, true),
            'price'          => fake()->randomElement([65000, 75000, 89000, 95000, 129000, 145000]),
            'category'       => fake()->randomElement($categories),
            'image'          => null,
            'rating'         => fake()->randomFloat(1, 4.0, 5.0),
            'stock'          => fake()->numberBetween(10, 200),
            'in_stock'       => true,
            'is_best_seller' => fake()->boolean(30),
            'is_featured'    => fake()->boolean(25),
        ];
    }

    /**
     * Mark the product as featured.
     */
    public function featured(): static
    {
        return $this->state(fn (array $attributes) => [
            'is_featured' => true,
        ]);
    }

    /**
     * Mark the product as a best seller.
     */
    public function bestSeller(): static
    {
        return $this->state(fn (array $attributes) => [
            'is_best_seller' => true,
        ]);
    }

    /**
     * Mark the product as out of stock.
     */
    public function outOfStock(): static
    {
        return $this->state(fn (array $attributes) => [
            'in_stock' => false,
            'stock'    => 0,
        ]);
    }
}
