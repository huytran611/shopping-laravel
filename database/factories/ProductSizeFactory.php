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
            'option_id' => $this->faker->numberBetween(6,8),
            'option_group_id' => $this->faker->numberBetween(2,2),
            'option_price_increment'=>$this->faker->numberBetween(1,20),
            'product_id'=>$this->faker->numberBetween(2,20),
        ];
    }
}
