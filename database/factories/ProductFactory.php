<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

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
            "stock" => $this->faker->numberBetween(10, 100),
            "sku" => str(Str::random(10))->upper(),
            "discount" => $this->faker->boolean(30) ? $this->faker->numberBetween(1, 9) * 5 : 0
        ];
    }
}
