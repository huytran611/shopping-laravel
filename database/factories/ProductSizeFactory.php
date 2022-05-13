<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductSize>
 */
class ProductSizeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {      
        $product_name = $this->faker->unique()->words($nb=2, $asText=true);
        $slug = Str::slug($product_name);

        return [
            //
            'name' => $product_name,
            'slug' => $slug,
            'size' => $this->faker->text(5),
            'product_id' => $this->faker->numberBetween(1,22),
            'quantity_size' => $this->faker->numberBetween(0,100),
        ];
    }
}
